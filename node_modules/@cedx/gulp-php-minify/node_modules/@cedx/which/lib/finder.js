'use strict';

const {stat} = require('fs');
const {delimiter, extname, join, resolve} = require('path');
const {promisify} = require('util');

/**
 * Finds the instances of an executable in the system path.
 */
exports.Finder = class Finder {

  /**
   * Value indicating whether the current platform is Windows.
   * @type {boolean}
   */
  static get isWindows() {
    if (process.platform == 'win32') return true;
    return process.OSTYPE == 'cygwin' || process.OSTYPE == 'msys';
  }

  /**
   * Initializes a new instance of the class from the following options:
   * - `extensions`: A string, or a list of strings, specifying the executable file extensions. Defaults to the `PATHEXT` environment variable.
   * - `path`: A string, or a list of strings, specifying the system path. Defaults to the `PATH` environment variable.
   * - `pathSeparator`: The character used to separate paths in the system path. Defaults to the `path.delimiter` constant.
   *
   * @param {object} [options] An object specifying values used to initialize this instance.
   */
  constructor({extensions = '', path = '', pathSeparator = ''} = {}) {
    if (!pathSeparator.length) pathSeparator = Finder.isWindows ? ';' : delimiter;

    if (!Array.isArray(path)) path = path.toString().split(pathSeparator).filter(item => item.length);
    if (!path.length) {
      let pathEnv = process.env.PATH;
      if (typeof pathEnv == 'string' && pathEnv.length) path = pathEnv.split(pathSeparator);
    }

    if (!Array.isArray(extensions)) extensions = extensions.toString().split(pathSeparator).filter(item => item.length);
    if (!extensions.length && Finder.isWindows) {
      let pathExt = process.env.PATHEXT;
      extensions = typeof pathExt == 'string' && pathExt.length ? pathExt.split(pathSeparator) : ['.exe', '.cmd', '.bat', '.com'];
    }

    /**
     * The list of executable file extensions.
     * @type {string[]}
     */
    this.extensions = extensions.map(extension => extension.toUpperCase());

    /**
     * The list of system paths.
     * @type {string[]}
     */
    this.path = path.map(directory => directory.replace(/^"+|"+$/g, ''));

    /**
     * The character used to separate paths in the system path.
     * @type {string}
     */
    this.pathSeparator = pathSeparator;
  }

  /**
   * The class name.
   * @type {string}
   */
  get [Symbol.toStringTag]() {
    return 'Finder';
  }

  /**
   * Finds the instances of an executable in the system path.
   * @param {string} command The command to be resolved.
   * @param {boolean} [all] Value indicating whether to return all executables found, or just the first one.
   * @return {Promise<string[]>} The paths of the executables found, or an empty array if the command was not found.
   */
  async find(command, all = true) {
    let executables = [];
    for (let path of this.path) {
      executables.push(...await this._findExecutables(path, command, all));
      if (!all && executables.length) return executables;
    }

    return executables;
  }

  /**
   * Gets a value indicating whether the specified file is executable.
   * @param {string} file The path of the file to be checked.
   * @return {Promise<boolean>} `true` if the specified file is executable, otherwise `false`.
   */
  async isExecutable(file) {
    const getStats = promisify(stat);

    try {
      let fileStats = await getStats(file);
      if (!fileStats.isFile()) return false;
      return Finder.isWindows ? this._checkFileExtension(file) : this._checkFilePermissions(fileStats);
    }

    catch (err) {
      return false;
    }
  }

  /**
   * Checks that the specified file is executable according to the executable file extensions.
   * @param {string} file The path of the file to be checked.
   * @return {boolean} Value indicating whether the specified file is executable.
   */
  _checkFileExtension(file) {
    return this.extensions.includes(extname(file).toUpperCase()) || this.extensions.includes(file.toUpperCase());
  }

  /**
   * Checks that the specified file is executable according to its permissions.
   * @param {fs.Stats} fileStats A reference to the file to be checked.
   * @return {boolean} Value indicating whether the specified file is executable.
   */
  _checkFilePermissions(fileStats) {
    // Others.
    let perms = fileStats.mode;
    if (perms & 0o001) return true;

    // Group.
    let gid = typeof process.getgid == 'function' ? process.getgid() : -1;
    if (perms & 0o010) return gid == fileStats.gid;

    // Owner.
    let uid = typeof process.getuid == 'function' ? process.getuid() : -1;
    if (perms & 0o100) return uid == fileStats.uid;

    // Root.
    return perms & (0o100 | 0o010) ? uid == 0 : false;
  }

  /**
   * Finds the instances of an executable in the specified directory.
   * @param {string} directory The directory path.
   * @param {string} command The command to be resolved.
   * @param {boolean} [all] Value indicating whether to return all executables found, or just the first one.
   * @return {Promise<string[]>} The paths of the executables found, or an empty array if the command was not found.
   */
  async _findExecutables(directory, command, all = true) {
    let executables = [];
    for (let extension of [''].concat(this.extensions)) {
      let resolvedPath = resolve(join(directory, command) + extension.toLowerCase());
      if (await this.isExecutable(resolvedPath)) {
        executables.push(resolvedPath);
        if (!all) return executables;
      }
    }

    return executables;
  }
};
