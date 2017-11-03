# Which for JS
![Runtime](https://img.shields.io/badge/node-%3E%3D8.6-brightgreen.svg) ![Release](https://img.shields.io/npm/v/@cedx/which.svg) ![License](https://img.shields.io/npm/l/@cedx/which.svg) ![Downloads](https://img.shields.io/npm/dt/@cedx/which.svg) ![Dependencies](https://david-dm.org/cedx/which.js.svg) ![Coverage](https://coveralls.io/repos/github/cedx/which.js/badge.svg) ![Build](https://travis-ci.org/cedx/which.js.svg)

Find the instances of an executable in the system path, implemented in [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript).

## Requirements
The latest [Node.js](https://nodejs.org) and [npm](https://www.npmjs.com) versions.
If you plan to play with the sources, you will also need the latest [Gulp](http://gulpjs.com) version.

## Installing via [npm](https://www.npmjs.com)
From a command prompt, run:

```shell
$ npm install --save @cedx/which
```

## Usage
This package provides a single function, `which()`, allowing to locate a command in the system path:

```javascript
const {which} = require('@cedx/which');

try {
  // "path" is the absolute path to the executable.
  let path = await which('foobar');
  console.log(`The "foobar" command is located at: ${path}`);
}

catch (err) {
  // The command was not found on the system path.
  console.log('The "foobar" command is not found.');
}
```

The function returns a [`Promise<string>`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise) specifying the path of the first instance of the executables found. If the command could not be located, an [`Error`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Error) is thrown.

### Options
The behavior of the `which()` function can be customized using the following optional named parameters.

### `all: boolean = false`
A value indicating whether to return all executables found, instead of just the first one.

If you pass `true` as parameter value, the function will return a `Promise<string[]>` providing all paths found, instead of a `Promise<string>`:

```javascript
let paths = await which('foobar', {all: true});

console.log('The "foobar" command was found at these locations:');
for (let path of paths) console.log(path);
```

### `extensions: string|string[] = ""`
The executable file extensions, provided as a string or a list of file extensions. Defaults to the list of extensions provided by the `PATHEXT` environment variable.

The `extensions` option is only meaningful on the Windows platform, where the executability of a file is determined from its extension:

```javascript
which('foobar', {extensions: '.FOO;.EXE;.CMD'});
```

### `onError: function(command: string) => *`
By default, when the specified command cannot be located, an `Error` is thrown. You can disable this exception by providing your own error handler:

```javascript
let path = await which('foobar', {onError: () => ''});

if (!path.length) console.log('The "foobar" command is not found.');
else console.log(`The "foobar" command is located at: ${path}`);
```

When an `onError` handler is provided, it is called with the command as argument, and its return value is used instead. This is preferable to throwing and then immediately catching the `Error`.

### `path: string|string[] = ""`
The system path, provided as a string or a list of directories. Defaults to the list of paths provided by the `PATH` environment variable.

```javascript
which('foobar', {path: ['/usr/local/bin', '/usr/bin']});
```

### `pathSeparator: string = ""`
The character used to separate paths in the system path. Defaults to the [`path.delimiter`](https://nodejs.org/api/path.html#path_path_delimiter) constant.

```javascript
which('foobar', {pathSeparator: '#'});
```

## Command line interface
From a command prompt, install the `which` executable:

```shell
$ npm install --global @cedx/which
```

Then use it to find the instances of an executable:

```shell
$ which --help

  Usage: which [options] <command>

  Find the instances of an executable in the system path.

  Options:

    -v, --version  output the version number
    -a, --all      list all instances of executables found (instead of just the first one)
    -s, --silent   silence the output, just return the exit code (0 if any executable is found, otherwise 1)
    -h, --help     output usage information
```

For example:

```shell
$ which --all node
```

## See also
- [API reference](https://cedx.github.io/which.js)
- [Code coverage](https://coveralls.io/github/cedx/which.js)
- [Continuous integration](https://travis-ci.org/cedx/which.js)

## License
[Which for JS](https://github.com/cedx/which.js) is distributed under the MIT License.
