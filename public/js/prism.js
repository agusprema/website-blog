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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./resources/js/prism.js":
/*!*******************************!*\
  !*** ./resources/js/prism.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/* PrismJS 1.23.0
https://prismjs.com/download.html#themes=prism&languages=json+json5+jsonp */
var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
    Prism = function (u) {
  var c = /\blang(?:uage)?-([\w-]+)\b/i,
      n = 0,
      M = {
    manual: u.Prism && u.Prism.manual,
    disableWorkerMessageHandler: u.Prism && u.Prism.disableWorkerMessageHandler,
    util: {
      encode: function e(n) {
        return n instanceof W ? new W(n.type, e(n.content), n.alias) : Array.isArray(n) ? n.map(e) : n.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ");
      },
      type: function type(e) {
        return Object.prototype.toString.call(e).slice(8, -1);
      },
      objId: function objId(e) {
        return e.__id || Object.defineProperty(e, "__id", {
          value: ++n
        }), e.__id;
      },
      clone: function r(e, t) {
        var a, n;

        switch (t = t || {}, M.util.type(e)) {
          case "Object":
            if (n = M.util.objId(e), t[n]) return t[n];

            for (var i in a = {}, t[n] = a, e) {
              e.hasOwnProperty(i) && (a[i] = r(e[i], t));
            }

            return a;

          case "Array":
            return n = M.util.objId(e), t[n] ? t[n] : (a = [], t[n] = a, e.forEach(function (e, n) {
              a[n] = r(e, t);
            }), a);

          default:
            return e;
        }
      },
      getLanguage: function getLanguage(e) {
        for (; e && !c.test(e.className);) {
          e = e.parentElement;
        }

        return e ? (e.className.match(c) || [, "none"])[1].toLowerCase() : "none";
      },
      currentScript: function currentScript() {
        if ("undefined" == typeof document) return null;
        if ("currentScript" in document) return document.currentScript;

        try {
          throw new Error();
        } catch (e) {
          var n = (/at [^(\r\n]*\((.*):.+:.+\)$/i.exec(e.stack) || [])[1];

          if (n) {
            var r = document.getElementsByTagName("script");

            for (var t in r) {
              if (r[t].src == n) return r[t];
            }
          }

          return null;
        }
      },
      isActive: function isActive(e, n, r) {
        for (var t = "no-" + n; e;) {
          var a = e.classList;
          if (a.contains(n)) return !0;
          if (a.contains(t)) return !1;
          e = e.parentElement;
        }

        return !!r;
      }
    },
    languages: {
      extend: function extend(e, n) {
        var r = M.util.clone(M.languages[e]);

        for (var t in n) {
          r[t] = n[t];
        }

        return r;
      },
      insertBefore: function insertBefore(r, e, n, t) {
        var a = (t = t || M.languages)[r],
            i = {};

        for (var l in a) {
          if (a.hasOwnProperty(l)) {
            if (l == e) for (var o in n) {
              n.hasOwnProperty(o) && (i[o] = n[o]);
            }
            n.hasOwnProperty(l) || (i[l] = a[l]);
          }
        }

        var s = t[r];
        return t[r] = i, M.languages.DFS(M.languages, function (e, n) {
          n === s && e != r && (this[e] = i);
        }), i;
      },
      DFS: function e(n, r, t, a) {
        a = a || {};
        var i = M.util.objId;

        for (var l in n) {
          if (n.hasOwnProperty(l)) {
            r.call(n, l, n[l], t || l);
            var o = n[l],
                s = M.util.type(o);
            "Object" !== s || a[i(o)] ? "Array" !== s || a[i(o)] || (a[i(o)] = !0, e(o, r, l, a)) : (a[i(o)] = !0, e(o, r, null, a));
          }
        }
      }
    },
    plugins: {},
    highlightAll: function highlightAll(e, n) {
      M.highlightAllUnder(document, e, n);
    },
    highlightAllUnder: function highlightAllUnder(e, n, r) {
      var t = {
        callback: r,
        container: e,
        selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'
      };
      M.hooks.run("before-highlightall", t), t.elements = Array.prototype.slice.apply(t.container.querySelectorAll(t.selector)), M.hooks.run("before-all-elements-highlight", t);

      for (var a, i = 0; a = t.elements[i++];) {
        M.highlightElement(a, !0 === n, t.callback);
      }
    },
    highlightElement: function highlightElement(e, n, r) {
      var t = M.util.getLanguage(e),
          a = M.languages[t];
      e.className = e.className.replace(c, "").replace(/\s+/g, " ") + " language-" + t;
      var i = e.parentElement;
      i && "pre" === i.nodeName.toLowerCase() && (i.className = i.className.replace(c, "").replace(/\s+/g, " ") + " language-" + t);
      var l = {
        element: e,
        language: t,
        grammar: a,
        code: e.textContent
      };

      function o(e) {
        l.highlightedCode = e, M.hooks.run("before-insert", l), l.element.innerHTML = l.highlightedCode, M.hooks.run("after-highlight", l), M.hooks.run("complete", l), r && r.call(l.element);
      }

      if (M.hooks.run("before-sanity-check", l), !l.code) return M.hooks.run("complete", l), void (r && r.call(l.element));
      if (M.hooks.run("before-highlight", l), l.grammar) {
        if (n && u.Worker) {
          var s = new Worker(M.filename);
          s.onmessage = function (e) {
            o(e.data);
          }, s.postMessage(JSON.stringify({
            language: l.language,
            code: l.code,
            immediateClose: !0
          }));
        } else o(M.highlight(l.code, l.grammar, l.language));
      } else o(M.util.encode(l.code));
    },
    highlight: function highlight(e, n, r) {
      var t = {
        code: e,
        grammar: n,
        language: r
      };
      return M.hooks.run("before-tokenize", t), t.tokens = M.tokenize(t.code, t.grammar), M.hooks.run("after-tokenize", t), W.stringify(M.util.encode(t.tokens), t.language);
    },
    tokenize: function tokenize(e, n) {
      var r = n.rest;

      if (r) {
        for (var t in r) {
          n[t] = r[t];
        }

        delete n.rest;
      }

      var a = new i();
      return I(a, a.head, e), function e(n, r, t, a, i, l) {
        for (var o in t) {
          if (t.hasOwnProperty(o) && t[o]) {
            var s = t[o];
            s = Array.isArray(s) ? s : [s];

            for (var u = 0; u < s.length; ++u) {
              if (l && l.cause == o + "," + u) return;
              var c = s[u],
                  g = c.inside,
                  f = !!c.lookbehind,
                  h = !!c.greedy,
                  d = c.alias;

              if (h && !c.pattern.global) {
                var v = c.pattern.toString().match(/[imsuy]*$/)[0];
                c.pattern = RegExp(c.pattern.source, v + "g");
              }

              for (var p = c.pattern || c, m = a.next, y = i; m !== r.tail && !(l && y >= l.reach); y += m.value.length, m = m.next) {
                var k = m.value;
                if (r.length > n.length) return;

                if (!(k instanceof W)) {
                  var b,
                      x = 1;

                  if (h) {
                    if (!(b = z(p, y, n, f))) break;
                    var w = b.index,
                        A = b.index + b[0].length,
                        P = y;

                    for (P += m.value.length; P <= w;) {
                      m = m.next, P += m.value.length;
                    }

                    if (P -= m.value.length, y = P, m.value instanceof W) continue;

                    for (var S = m; S !== r.tail && (P < A || "string" == typeof S.value); S = S.next) {
                      x++, P += S.value.length;
                    }

                    x--, k = n.slice(y, P), b.index -= y;
                  } else if (!(b = z(p, 0, k, f))) continue;

                  var w = b.index,
                      E = b[0],
                      O = k.slice(0, w),
                      L = k.slice(w + E.length),
                      N = y + k.length;
                  l && N > l.reach && (l.reach = N);
                  var j = m.prev;
                  O && (j = I(r, j, O), y += O.length), q(r, j, x);
                  var C = new W(o, g ? M.tokenize(E, g) : E, d, E);

                  if (m = I(r, j, C), L && I(r, m, L), 1 < x) {
                    var _ = {
                      cause: o + "," + u,
                      reach: N
                    };
                    e(n, r, t, m.prev, y, _), l && _.reach > l.reach && (l.reach = _.reach);
                  }
                }
              }
            }
          }
        }
      }(e, a, n, a.head, 0), function (e) {
        var n = [],
            r = e.head.next;

        for (; r !== e.tail;) {
          n.push(r.value), r = r.next;
        }

        return n;
      }(a);
    },
    hooks: {
      all: {},
      add: function add(e, n) {
        var r = M.hooks.all;
        r[e] = r[e] || [], r[e].push(n);
      },
      run: function run(e, n) {
        var r = M.hooks.all[e];
        if (r && r.length) for (var t, a = 0; t = r[a++];) {
          t(n);
        }
      }
    },
    Token: W
  };

  function W(e, n, r, t) {
    this.type = e, this.content = n, this.alias = r, this.length = 0 | (t || "").length;
  }

  function z(e, n, r, t) {
    e.lastIndex = n;
    var a = e.exec(r);

    if (a && t && a[1]) {
      var i = a[1].length;
      a.index += i, a[0] = a[0].slice(i);
    }

    return a;
  }

  function i() {
    var e = {
      value: null,
      prev: null,
      next: null
    },
        n = {
      value: null,
      prev: e,
      next: null
    };
    e.next = n, this.head = e, this.tail = n, this.length = 0;
  }

  function I(e, n, r) {
    var t = n.next,
        a = {
      value: r,
      prev: n,
      next: t
    };
    return n.next = a, t.prev = a, e.length++, a;
  }

  function q(e, n, r) {
    for (var t = n.next, a = 0; a < r && t !== e.tail; a++) {
      t = t.next;
    }

    (n.next = t).prev = n, e.length -= a;
  }

  if (u.Prism = M, W.stringify = function n(e, r) {
    if ("string" == typeof e) return e;

    if (Array.isArray(e)) {
      var t = "";
      return e.forEach(function (e) {
        t += n(e, r);
      }), t;
    }

    var a = {
      type: e.type,
      content: n(e.content, r),
      tag: "span",
      classes: ["token", e.type],
      attributes: {},
      language: r
    },
        i = e.alias;
    i && (Array.isArray(i) ? Array.prototype.push.apply(a.classes, i) : a.classes.push(i)), M.hooks.run("wrap", a);
    var l = "";

    for (var o in a.attributes) {
      l += " " + o + '="' + (a.attributes[o] || "").replace(/"/g, "&quot;") + '"';
    }

    return "<" + a.tag + ' class="' + a.classes.join(" ") + '"' + l + ">" + a.content + "</" + a.tag + ">";
  }, !u.document) return u.addEventListener && (M.disableWorkerMessageHandler || u.addEventListener("message", function (e) {
    var n = JSON.parse(e.data),
        r = n.language,
        t = n.code,
        a = n.immediateClose;
    u.postMessage(M.highlight(t, M.languages[r], r)), a && u.close();
  }, !1)), M;
  var e = M.util.currentScript();

  function r() {
    M.manual || M.highlightAll();
  }

  if (e && (M.filename = e.src, e.hasAttribute("data-manual") && (M.manual = !0)), !M.manual) {
    var t = document.readyState;
    "loading" === t || "interactive" === t && e && e.defer ? document.addEventListener("DOMContentLoaded", r) : window.requestAnimationFrame ? window.requestAnimationFrame(r) : window.setTimeout(r, 16);
  }

  return M;
}(_self);

 true && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism);
Prism.languages.json = {
  property: {
    pattern: /(^|[^\\])"(?:\\.|[^\\"\r\n])*"(?=\s*:)/,
    lookbehind: !0,
    greedy: !0
  },
  string: {
    pattern: /(^|[^\\])"(?:\\.|[^\\"\r\n])*"(?!\s*:)/,
    lookbehind: !0,
    greedy: !0
  },
  comment: {
    pattern: /\/\/.*|\/\*[\s\S]*?(?:\*\/|$)/,
    greedy: !0
  },
  number: /-?\b\d+(?:\.\d+)?(?:e[+-]?\d+)?\b/i,
  punctuation: /[{}[\],]/,
  operator: /:/,
  "boolean": /\b(?:true|false)\b/,
  "null": {
    pattern: /\bnull\b/,
    alias: "keyword"
  }
}, Prism.languages.webmanifest = Prism.languages.json;
!function (n) {
  var e = /("|')(?:\\(?:\r\n?|\n|.)|(?!\1)[^\\\r\n])*\1/;
  n.languages.json5 = n.languages.extend("json", {
    property: [{
      pattern: RegExp(e.source + "(?=\\s*:)"),
      greedy: !0
    }, {
      pattern: /(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*:)/,
      alias: "unquoted"
    }],
    string: {
      pattern: e,
      greedy: !0
    },
    number: /[+-]?\b(?:NaN|Infinity|0x[a-fA-F\d]+)\b|[+-]?(?:\b\d+(?:\.\d*)?|\B\.\d+)(?:[eE][+-]?\d+\b)?/
  });
}(Prism);
Prism.languages.jsonp = Prism.languages.extend("json", {
  punctuation: /[{}[\]();,.]/
}), Prism.languages.insertBefore("jsonp", "punctuation", {
  "function": /(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*\()/
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/prism.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\laragon\www\berita\resources\js\prism.js */"./resources/js/prism.js");


/***/ })

/******/ });