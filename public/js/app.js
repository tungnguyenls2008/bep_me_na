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
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\xampp\\htdocs\\bep_me_na\\resources\\js\\app.js: Unexpected token, expected \",\" (5:23)\n\n\u001b[0m \u001b[90m 3 |\u001b[39m     $\u001b[33m.\u001b[39majax({\u001b[0m\n\u001b[0m \u001b[90m 4 |\u001b[39m         type\u001b[33m:\u001b[39m \u001b[32m'POST'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 5 |\u001b[39m         url\u001b[33m:\u001b[39m \u001b[32m'{{route('\u001b[39m\u001b[36mget\u001b[39m\u001b[33m-\u001b[39mmenu\u001b[33m-\u001b[39mprice\u001b[32m')}}'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m   |\u001b[39m                        \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 6 |\u001b[39m         data\u001b[33m:\u001b[39m {\u001b[0m\n\u001b[0m \u001b[90m 7 |\u001b[39m             id\u001b[33m:\u001b[39m$(\u001b[32m\"#menu_id\"\u001b[39m)\u001b[33m.\u001b[39mval()\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 8 |\u001b[39m             _token\u001b[33m:\u001b[39m\u001b[32m'{{ csrf_token() }}'\u001b[39m\u001b[0m\n    at Parser._raise (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:541:17)\n    at Parser.raiseWithData (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:534:17)\n    at Parser.raise (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:495:17)\n    at Parser.unexpected (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:3580:16)\n    at Parser.expect (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:3554:28)\n    at Parser.parseObjectLike (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:12460:14)\n    at Parser.parseExprAtom (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11913:23)\n    at Parser.parseExprSubscripts (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11584:23)\n    at Parser.parseUpdate (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11564:21)\n    at Parser.parseMaybeUnary (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11539:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11353:61)\n    at Parser.parseExprOps (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11360:23)\n    at Parser.parseMaybeConditional (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11330:23)\n    at Parser.parseMaybeAssign (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11290:21)\n    at C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11248:39\n    at Parser.allowInAnd (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:13137:12)\n    at Parser.parseMaybeAssignAllowIn (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11248:17)\n    at Parser.parseExprListItem (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:12874:18)\n    at Parser.parseCallExpressionArguments (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11791:22)\n    at Parser.parseCoverCallAndAsyncArrowHead (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11698:29)\n    at Parser.parseSubscript (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11628:19)\n    at Parser.parseSubscripts (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11601:19)\n    at Parser.parseExprSubscripts (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11590:17)\n    at Parser.parseUpdate (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11564:21)\n    at Parser.parseMaybeUnary (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11539:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11353:61)\n    at Parser.parseExprOps (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11360:23)\n    at Parser.parseMaybeConditional (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11330:23)\n    at Parser.parseMaybeAssign (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11290:21)\n    at Parser.parseExpressionBase (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11226:23)\n    at C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11220:39\n    at Parser.allowInAnd (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:13131:16)\n    at Parser.parseExpression (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:11220:17)\n    at Parser.parseStatementContent (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:13485:23)\n    at Parser.parseStatement (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:13352:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\xampp\\htdocs\\bep_me_na\\node_modules\\@babel\\parser\\lib\\index.js:13941:25)");

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

__webpack_require__(/*! C:\xampp\htdocs\bep_me_na\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\bep_me_na\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });