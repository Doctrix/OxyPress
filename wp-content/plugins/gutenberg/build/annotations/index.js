window.wp=window.wp||{},window.wp.annotations=function(t){var n={};function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}return e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:r})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(e.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var o in t)e.d(r,o,function(n){return t[n]}.bind(null,o));return r},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=394)}({1:function(t,n){t.exports=window.wp.i18n},146:function(t,n,e){"use strict";var r="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)||"undefined"!=typeof msCrypto&&"function"==typeof msCrypto.getRandomValues&&msCrypto.getRandomValues.bind(msCrypto),o=new Uint8Array(16);function a(){if(!r)throw new Error("crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported");return r(o)}for(var i=/^(?:[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}|00000000-0000-0000-0000-000000000000)$/i,u=function(t){return"string"==typeof t&&i.test(t)},c=[],l=0;l<256;++l)c.push((l+256).toString(16).substr(1));n.a=function(t,n,e){var r=(t=t||{}).random||(t.rng||a)();if(r[6]=15&r[6]|64,r[8]=63&r[8]|128,n){e=e||0;for(var o=0;o<16;++o)n[e+o]=r[o];return n}return function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=(c[t[n+0]]+c[t[n+1]]+c[t[n+2]]+c[t[n+3]]+"-"+c[t[n+4]]+c[t[n+5]]+"-"+c[t[n+6]]+c[t[n+7]]+"-"+c[t[n+8]]+c[t[n+9]]+"-"+c[t[n+10]]+c[t[n+11]]+c[t[n+12]]+c[t[n+13]]+c[t[n+14]]+c[t[n+15]]).toLowerCase();if(!u(e))throw TypeError("Stringified UUID is invalid");return e}(r)}},15:function(t,n,e){"use strict";e.d(n,"a",(function(){return o}));var r=e(46);function o(t,n){if(null==t)return{};var e,o,a=Object(r.a)(t,n);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);for(o=0;o<i.length;o++)e=i[o],n.indexOf(e)>=0||Object.prototype.propertyIsEnumerable.call(t,e)&&(a[e]=t[e])}return a}},17:function(t,n,e){"use strict";e.d(n,"a",(function(){return i}));var r=e(23),o=e(36),a=e(29);function i(t){return function(t){if(Array.isArray(t))return Object(r.a)(t)}(t)||Object(o.a)(t)||Object(a.a)(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},2:function(t,n){t.exports=window.lodash},22:function(t,n){t.exports=window.wp.richText},23:function(t,n,e){"use strict";function r(t,n){(null==n||n>t.length)&&(n=t.length);for(var e=0,r=new Array(n);e<n;e++)r[e]=t[e];return r}e.d(n,"a",(function(){return r}))},29:function(t,n,e){"use strict";e.d(n,"a",(function(){return o}));var r=e(23);function o(t,n){if(t){if("string"==typeof t)return Object(r.a)(t,n);var e=Object.prototype.toString.call(t).slice(8,-1);return"Object"===e&&t.constructor&&(e=t.constructor.name),"Map"===e||"Set"===e?Array.from(t):"Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e)?Object(r.a)(t,n):void 0}}},32:function(t,n){t.exports=window.wp.hooks},36:function(t,n,e){"use strict";function r(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}e.d(n,"a",(function(){return r}))},394:function(t,n,e){"use strict";e.r(n),e.d(n,"store",(function(){return D}));var r={};e.r(r),e.d(r,"__experimentalGetAnnotationsForBlock",(function(){return w})),e.d(r,"__experimentalGetAllAnnotationsForBlock",(function(){return _})),e.d(r,"__experimentalGetAnnotationsForRichText",(function(){return T})),e.d(r,"__experimentalGetAnnotations",(function(){return N}));var o={};e.r(o),e.d(o,"__experimentalAddAnnotation",(function(){return E})),e.d(o,"__experimentalRemoveAnnotation",(function(){return I})),e.d(o,"__experimentalUpdateAnnotationRange",(function(){return R})),e.d(o,"__experimentalRemoveAnnotationsBySource",(function(){return S}));var a=e(15),i=e(22),u=e(1),c={name:"core/annotation",title:Object(u.__)("Annotation"),tagName:"mark",className:"annotation-text",attributes:{className:"class",id:"id"},edit:function(){return null},__experimentalGetPropsForEditableTreePreparation:function(t,n){var e=n.richTextIdentifier,r=n.blockClientId;return{annotations:t("core/annotations").__experimentalGetAnnotationsForRichText(r,e)}},__experimentalCreatePrepareEditableTree:function(t){var n=t.annotations;return function(t,e){if(0===n.length)return t;var r={formats:t,text:e};return(r=function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[];return n.forEach((function(n){var e=n.start,r=n.end;e>t.text.length&&(e=t.text.length),r>t.text.length&&(r=t.text.length);var o="annotation-text-"+n.source,a="annotation-text-"+n.id;t=Object(i.applyFormat)(t,{type:"core/annotation",attributes:{className:o,id:a}},e,r)})),t}(r,n)).formats}},__experimentalGetPropsForEditableTreeChangeHandler:function(t){return{removeAnnotation:t("core/annotations").__experimentalRemoveAnnotation,updateAnnotationRange:t("core/annotations").__experimentalUpdateAnnotationRange}},__experimentalCreateOnChangeEditableValue:function(t){return function(n){var e=function(t){var n={};return t.forEach((function(t,e){(t=(t=t||[]).filter((function(t){return"core/annotation"===t.type}))).forEach((function(t){var r=t.attributes.id;r=r.replace("annotation-text-",""),n.hasOwnProperty(r)||(n[r]={start:e}),n[r].end=e+1}))})),n}(n),r=t.removeAnnotation,o=t.updateAnnotationRange;!function(t,n,e){var r=e.removeAnnotation,o=e.updateAnnotationRange;t.forEach((function(t){var e=n[t.id];if(e){var a=t.start,i=t.end;a===e.start&&i===e.end||o(t.id,e.start,e.end)}else r(t.id)}))}(t.annotations,e,{removeAnnotation:r,updateAnnotationRange:o})}}},l=c.name,f=Object(a.a)(c,["name"]);Object(i.registerFormatType)(l,f);var s=e(32),d=e(4);Object(s.addFilter)("editor.BlockListBlock","core/annotations",(function(t){return Object(d.withSelect)((function(t,n){var e=n.clientId,r=n.className;return{className:t("core/annotations").__experimentalGetAnnotationsForBlock(e).map((function(t){return"is-annotated-by-"+t.source})).concat(r).filter(Boolean).join(" ")}}))(t)}));var p=e(17),b=e(6),v=e(2);function O(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,r)}return e}function y(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?O(Object(e),!0).forEach((function(n){Object(b.a)(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):O(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}function g(t,n){var e=t.filter(n);return t.length===e.length?t:e}function m(t){return Object(v.isNumber)(t.start)&&Object(v.isNumber)(t.end)&&t.start<=t.end}var h=e(49);function j(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,r)}return e}function x(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?j(Object(e),!0).forEach((function(n){Object(b.a)(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):j(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}var A=[],w=Object(h.a)((function(t,n){var e;return(null!==(e=null==t?void 0:t[n])&&void 0!==e?e:[]).filter((function(t){return"block"===t.selector}))}),(function(t,n){var e;return[null!==(e=null==t?void 0:t[n])&&void 0!==e?e:A]}));function _(t,n){var e;return null!==(e=null==t?void 0:t[n])&&void 0!==e?e:A}var T=Object(h.a)((function(t,n,e){var r;return(null!==(r=null==t?void 0:t[n])&&void 0!==r?r:[]).filter((function(t){return"range"===t.selector&&e===t.richTextIdentifier})).map((function(t){var n=t.range,e=Object(a.a)(t,["range"]);return x(x({},n),e)}))}),(function(t,n){var e;return[null!==(e=null==t?void 0:t[n])&&void 0!==e?e:A]}));function N(t){return Object(v.flatMap)(t,(function(t){return t}))}var P=e(146);function E(t){var n=t.blockClientId,e=t.richTextIdentifier,r=void 0===e?null:e,o=t.range,a=void 0===o?null:o,i=t.selector,u=void 0===i?"range":i,c=t.source,l=void 0===c?"default":c,f=t.id,s={type:"ANNOTATION_ADD",id:void 0===f?Object(P.a)():f,blockClientId:n,richTextIdentifier:r,source:l,selector:u};return"range"===u&&(s.range=a),s}function I(t){return{type:"ANNOTATION_REMOVE",annotationId:t}}function R(t,n,e){return{type:"ANNOTATION_UPDATE_RANGE",annotationId:t,start:n,end:e}}function S(t){return{type:"ANNOTATION_REMOVE_SOURCE",source:t}}var D=Object(d.createReduxStore)("core/annotations",{reducer:function(){var t,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=arguments.length>1?arguments[1]:void 0;switch(e.type){case"ANNOTATION_ADD":var r=e.blockClientId,o={id:e.id,blockClientId:r,richTextIdentifier:e.richTextIdentifier,source:e.source,selector:e.selector,range:e.range};if("range"===o.selector&&!m(o.range))return n;var a=null!==(t=null==n?void 0:n[r])&&void 0!==t?t:[];return y(y({},n),{},Object(b.a)({},r,[].concat(Object(p.a)(a),[o])));case"ANNOTATION_REMOVE":return Object(v.mapValues)(n,(function(t){return g(t,(function(t){return t.id!==e.annotationId}))}));case"ANNOTATION_UPDATE_RANGE":return Object(v.mapValues)(n,(function(t){var n=!1,r=t.map((function(t){return t.id===e.annotationId?(n=!0,y(y({},t),{},{range:{start:e.start,end:e.end}})):t}));return n?r:t}));case"ANNOTATION_REMOVE_SOURCE":return Object(v.mapValues)(n,(function(t){return g(t,(function(t){return t.source!==e.source}))}))}return n},selectors:r,actions:o});Object(d.register)(D)},4:function(t,n){t.exports=window.wp.data},46:function(t,n,e){"use strict";function r(t,n){if(null==t)return{};var e,r,o={},a=Object.keys(t);for(r=0;r<a.length;r++)e=a[r],n.indexOf(e)>=0||(o[e]=t[e]);return o}e.d(n,"a",(function(){return r}))},49:function(t,n,e){"use strict";var r,o;function a(t){return[t]}function i(){var t={clear:function(){t.head=null}};return t}function u(t,n,e){var r;if(t.length!==n.length)return!1;for(r=e;r<t.length;r++)if(t[r]!==n[r])return!1;return!0}r={},o="undefined"!=typeof WeakMap,n.a=function(t,n){var e,c;function l(){e=o?new WeakMap:i()}function f(){var e,r,o,a,i,l=arguments.length;for(a=new Array(l),o=0;o<l;o++)a[o]=arguments[o];for(i=n.apply(null,a),(e=c(i)).isUniqueByDependants||(e.lastDependants&&!u(i,e.lastDependants,0)&&e.clear(),e.lastDependants=i),r=e.head;r;){if(u(r.args,a,1))return r!==e.head&&(r.prev.next=r.next,r.next&&(r.next.prev=r.prev),r.next=e.head,r.prev=null,e.head.prev=r,e.head=r),r.val;r=r.next}return r={val:t.apply(null,a)},a[0]=null,r.args=a,e.head&&(e.head.prev=r,r.next=e.head),e.head=r,r.val}return n||(n=a),c=o?function(t){var n,o,a,u,c,l=e,f=!0;for(n=0;n<t.length;n++){if(!(c=o=t[n])||"object"!=typeof c){f=!1;break}l.has(o)?l=l.get(o):(a=new WeakMap,l.set(o,a),l=a)}return l.has(r)||((u=i()).isUniqueByDependants=f,l.set(r,u)),l.get(r)}:function(){return e},f.getDependants=n,f.clear=l,l(),f}},6:function(t,n,e){"use strict";function r(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}e.d(n,"a",(function(){return r}))}});