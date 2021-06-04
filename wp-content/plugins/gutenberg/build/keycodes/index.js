window.wp=window.wp||{},window.wp.keycodes=function(t){var n={};function r(e){if(n[e])return n[e].exports;var u=n[e]={i:e,l:!1,exports:{}};return t[e].call(u.exports,u,u.exports,r),u.l=!0,u.exports}return r.m=t,r.c=n,r.d=function(t,n,e){r.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:e})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,n){if(1&n&&(t=r(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(r.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var u in t)r.d(e,u,function(n){return t[n]}.bind(null,u));return e},r.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(n,"a",n),n},r.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},r.p="",r(r.s=543)}({1:function(t,n){t.exports=window.wp.i18n},15:function(t,n,r){"use strict";r.d(n,"a",(function(){return c}));var e=r(25),u=r(39),o=r(31);function c(t){return function(t){if(Array.isArray(t))return Object(e.a)(t)}(t)||Object(u.a)(t)||Object(o.a)(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},2:function(t,n){t.exports=window.lodash},25:function(t,n,r){"use strict";function e(t,n){(null==n||n>t.length)&&(n=t.length);for(var r=0,e=new Array(n);r<n;r++)e[r]=t[r];return e}r.d(n,"a",(function(){return e}))},31:function(t,n,r){"use strict";r.d(n,"a",(function(){return u}));var e=r(25);function u(t,n){if(t){if("string"==typeof t)return Object(e.a)(t,n);var r=Object.prototype.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?Object(e.a)(t,n):void 0}}},39:function(t,n,r){"use strict";function e(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}r.d(n,"a",(function(){return e}))},5:function(t,n,r){"use strict";function e(t,n,r){return n in t?Object.defineProperty(t,n,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[n]=r,t}r.d(n,"a",(function(){return e}))},543:function(t,n,r){"use strict";r.r(n),r.d(n,"BACKSPACE",(function(){return a})),r.d(n,"TAB",(function(){return f})),r.d(n,"ENTER",(function(){return d})),r.d(n,"ESCAPE",(function(){return l})),r.d(n,"SPACE",(function(){return b})),r.d(n,"LEFT",(function(){return s})),r.d(n,"UP",(function(){return O})),r.d(n,"RIGHT",(function(){return j})),r.d(n,"DOWN",(function(){return p})),r.d(n,"DELETE",(function(){return y})),r.d(n,"F10",(function(){return m})),r.d(n,"ALT",(function(){return v})),r.d(n,"CTRL",(function(){return h})),r.d(n,"COMMAND",(function(){return w})),r.d(n,"SHIFT",(function(){return g})),r.d(n,"ZERO",(function(){return S})),r.d(n,"modifiers",(function(){return A})),r.d(n,"rawShortcut",(function(){return C})),r.d(n,"displayShortcutList",(function(){return E})),r.d(n,"displayShortcut",(function(){return P})),r.d(n,"shortcutAriaLabel",(function(){return _})),r.d(n,"isKeyboardEvent",(function(){return x}));var e=r(5),u=r(15),o=r(2),c=r(1);function i(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:window,n=t.navigator.platform;return-1!==n.indexOf("Mac")||Object(o.includes)(["iPad","iPhone"],n)}var a=8,f=9,d=13,l=27,b=32,s=37,O=38,j=39,p=40,y=46,m=121,v="alt",h="ctrl",w="meta",g="shift",S=48,A={primary:function(t){return t()?[w]:[h]},primaryShift:function(t){return t()?[g,w]:[h,g]},primaryAlt:function(t){return t()?[v,w]:[h,v]},secondary:function(t){return t()?[g,v,w]:[h,g,v]},access:function(t){return t()?[h,v]:[g,v]},ctrl:function(){return[h]},alt:function(){return[v]},ctrlShift:function(){return[h,g]},shift:function(){return[g]},shiftAlt:function(){return[g,v]}},C=Object(o.mapValues)(A,(function(t){return function(n){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i;return[].concat(Object(u.a)(t(r)),[n.toLowerCase()]).join("+")}})),E=Object(o.mapValues)(A,(function(t){return function(n){var r,c=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i,a=c(),f=(r={},Object(e.a)(r,v,a?"⌥":"Alt"),Object(e.a)(r,h,a?"⌃":"Ctrl"),Object(e.a)(r,w,"⌘"),Object(e.a)(r,g,a?"⇧":"Shift"),r),d=t(c).reduce((function(t,n){var r=Object(o.get)(f,n,n);return[].concat(Object(u.a)(t),a?[r]:[r,"+"])}),[]),l=Object(o.capitalize)(n);return[].concat(Object(u.a)(d),[l])}})),P=Object(o.mapValues)(E,(function(t){return function(n){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i;return t(n,r).join("")}})),_=Object(o.mapValues)(A,(function(t){return function(n){var r,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i,f=a(),d=(r={},Object(e.a)(r,g,"Shift"),Object(e.a)(r,w,f?"Command":"Control"),Object(e.a)(r,h,"Control"),Object(e.a)(r,v,f?"Option":"Alt"),Object(e.a)(r,",",Object(c.__)("Comma")),Object(e.a)(r,".",Object(c.__)("Period")),Object(e.a)(r,"`",Object(c.__)("Backtick")),r);return[].concat(Object(u.a)(t(a)),[n]).map((function(t){return Object(o.capitalize)(Object(o.get)(d,t,t))})).join(f?" ":" + ")}}));function T(t){return[v,h,w,g].filter((function(n){return t["".concat(n,"Key")]}))}var x=Object(o.mapValues)(A,(function(t){return function(n,r){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:i,u=t(e),c=T(n);return!Object(o.xor)(u,c).length&&(r?n.key===r:Object(o.includes)(u,n.key.toLowerCase()))}}))}});