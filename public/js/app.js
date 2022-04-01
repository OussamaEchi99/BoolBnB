/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\resources\\js\\app.js: Unexpected token (37:0)\n\n\u001b[0m \u001b[90m 35 |\u001b[39m \u001b[33mVue\u001b[39m\u001b[33m.\u001b[39mcomponent(\u001b[32m'Location'\u001b[39m\u001b[33m,\u001b[39m \u001b[33mLocation\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 36 |\u001b[39m \u001b[33mVue\u001b[39m\u001b[33m.\u001b[39mcomponent(\u001b[32m'Hostapp'\u001b[39m\u001b[33m,\u001b[39m \u001b[33mHostapp\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 37 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 38 |\u001b[39m \u001b[33mVue\u001b[39m\u001b[33m.\u001b[39mcomponent(\u001b[32m'payament-section'\u001b[39m\u001b[33m,\u001b[39m require(\u001b[32m'./components/Payament.vue'\u001b[39m)\u001b[33m.\u001b[39m\u001b[36mdefault\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 39 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 40 |\u001b[39m \u001b[33m>>>\u001b[39m\u001b[33m>>>\u001b[39m\u001b[33m>\u001b[39m \u001b[35m05\u001b[39mee4fd62182c58410daff931bf69f411068bd44\u001b[0m\n    at instantiate (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:72:32)\n    at constructor (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:358:12)\n    at Parser.raise (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:3334:19)\n    at Parser.unexpected (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:3372:16)\n    at Parser.parseExprAtom (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:13042:22)\n    at Parser.parseExprSubscripts (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12567:23)\n    at Parser.parseUpdate (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12546:21)\n    at Parser.parseMaybeUnary (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12517:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12311:61)\n    at Parser.parseExprOps (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12318:23)\n    at Parser.parseMaybeConditional (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12288:23)\n    at Parser.parseMaybeAssign (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12241:21)\n    at Parser.parseExpressionBase (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12177:23)\n    at C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12171:39\n    at Parser.allowInAnd (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14259:16)\n    at Parser.parseExpression (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12171:17)\n    at Parser.parseStatementContent (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14699:23)\n    at Parser.parseStatement (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14556:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:15195:25)\n    at Parser.parseBlockBody (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:15186:10)\n    at Parser.parseProgram (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14474:10)\n    at Parser.parseTopLevel (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14461:25)\n    at Parser.parse (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:16420:10)\n    at parse (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:16472:38)\n    at parser (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\core\\lib\\parser\\index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\core\\lib\\transformation\\index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\@babel\\core\\lib\\transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\gensync\\index.js:261:32)\n    at C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Users\\Alber\\Desktop\\Boolean\\Progetto.finale\\BoolBnB\\node_modules\\gensync\\index.js:223:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Alber\Desktop\Boolean\Progetto.finale\BoolBnB\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\Alber\Desktop\Boolean\Progetto.finale\BoolBnB\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });