'use strict';
const {Finder} = require('./finder');

/**
 * Finds the first instance of an executable in the system path.
 * @param {string} command The command to be resolved.
 * @param {object} [options] The options to be passed to the finder.
 * @return {Promise<string|string[]>} A string, or an array of strings, specifying the path(s) of the found executable(s).
 * @throws {Error} The specified command was not found.
 */
exports.which = async function which(command, {all = false, extensions = '', onError, path = '', pathSeparator = ''} = {}) {
  let executables = await new Finder({extensions, path, pathSeparator}).find(command, all);
  if (!executables.length) {
    if (typeof onError == 'function') return onError(command);
    throw new Error(`Command not found: ${command}`);
  }

  return all ? executables : executables[0];
};
