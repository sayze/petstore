!function(e){function t(t){for(var a,o,i=t[0],c=t[1],u=t[2],f=0,d=[];f<i.length;f++)o=i[f],r[o]&&d.push(r[o][0]),r[o]=0;for(a in c)Object.prototype.hasOwnProperty.call(c,a)&&(e[a]=c[a]);for(s&&s(t);d.length;)d.shift()();return l.push.apply(l,u||[]),n()}function n(){for(var e,t=0;t<l.length;t++){for(var n=l[t],a=!0,i=1;i<n.length;i++){var c=n[i];0!==r[c]&&(a=!1)}a&&(l.splice(t--,1),e=o(o.s=n[0]))}return e}var a={},r={0:0},l=[];function o(t){if(a[t])return a[t].exports;var n=a[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=e,o.c=a,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)o.d(n,a,function(t){return e[t]}.bind(null,a));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="";var i=window.webpackJsonp=window.webpackJsonp||[],c=i.push.bind(i);i.push=t,i=i.slice();for(var u=0;u<i.length;u++)t(i[u]);var s=c;l.push([113,1]),n()}({113:function(e,t,n){"use strict";n.r(t);var a=n(0),r=n.n(a),l=n(8),o=n.n(l),i=n(75),c=n.n(i),u=n(117),s=n(162),f=n(163),d=n(172),p=n(4),h=n.n(p),y=n(178),m=n(177);function b(){return(b=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e}).apply(this,arguments)}var v=function(e){var t=e.options,n=e.selected,a=e.handleChange,l=e.label,o=e.otherProps;return r.a.createElement(r.a.Fragment,null,r.a.createElement(m.a,{style:{fontSize:"12px",marginBottom:3},htmlFor:"status-simple"},l),r.a.createElement(d.a,b({fullWidth:!0,value:n,onChange:a,inputProps:{name:"status",id:"status-simple",label:"Status"}},o),t.map(function(e){return r.a.createElement(y.a,{key:e,value:e},e)})))};v.propTypes={options:h.a.arrayOf(h.a.string).isRequired,selected:h.a.string.isRequired,label:h.a.string,handleChange:h.a.func,otherProps:h.a.objectOf(h.a.any)},v.defaultProps={handleChange:function(){},label:"Status",otherProps:{}};var g=v;function E(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=[],a=!0,r=!1,l=void 0;try{for(var o,i=e[Symbol.iterator]();!(a=(o=i.next()).done)&&(n.push(o.value),!t||n.length!==t);a=!0);}catch(e){r=!0,l=e}finally{try{a||null==i.return||i.return()}finally{if(r)throw l}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}var S=function(e){var t=e.disabled,n=e.onApplyClick,l=E(Object(a.useState)("Mark Present"),2),o=l[0],i=l[1];return r.a.createElement(s.a,{container:!0,alignItems:"center",spacing:8},r.a.createElement(s.a,{item:!0,xs:3},r.a.createElement(g,{otherProps:{disabled:t},label:"With Selected",options:["Mark Present","Mark Absent"],selected:o,handleChange:function(e){i(e.target.value)}})),r.a.createElement(s.a,{item:!0,xs:3},r.a.createElement(f.a,{onClick:function(){return n(o)},disabled:t,size:"small",color:"primary",variant:"contained"},"Apply Changes")))};S.propTypes={disabled:h.a.bool},S.defaultProps={disabled:!1};var k=S,C=n(173);function O(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=[],a=!0,r=!1,l=void 0;try{for(var o,i=e[Symbol.iterator]();!(a=(o=i.next()).done)&&(n.push(o.value),!t||n.length!==t);a=!0);}catch(e){r=!0,l=e}finally{try{a||null==i.return||i.return()}finally{if(r)throw l}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}var w=function(e){var t=e.query,n=e.onQueryChange,l=e.onStatusChange,o=O(Object(a.useState)("Any"),2),i=o[0],c=o[1];return r.a.createElement(s.a,{container:!0,spacing:8},r.a.createElement(s.a,{item:!0,xs:3},r.a.createElement(C.a,{InputLabelProps:{shrink:!0},label:"First/Last Name",fullWidth:!0,type:"search",value:t,onChange:n})),r.a.createElement(s.a,{item:!0,xs:3},r.a.createElement(g,{options:["Any","Absent","Present"],handleChange:function(e){c(e.target.value),l(e.target.value)},selected:i})))},j=n(164),P=n(169),x=n(167),A=n(165),F=n(166),D=n(174),_=function(e){var t=e.data,n=e.onRowClick,a=e.onHeaderClick,l=t.filter(function(e){return e.checked}).length;return r.a.createElement(j.a,null,r.a.createElement(A.a,null,r.a.createElement(F.a,null,r.a.createElement(x.a,{padding:"checkbox"},r.a.createElement(D.a,{disabled:0===t.length,color:"primary",onClick:a,checked:t.length>0&&t.length===l,indeterminate:l>0&&l<t.length})),r.a.createElement(x.a,null,"Student ID"),r.a.createElement(x.a,null,"First Name"),r.a.createElement(x.a,null,"Last Name"),r.a.createElement(x.a,null,"Status"))),r.a.createElement(P.a,null,t.map(function(e){return r.a.createElement(F.a,{hover:!0,onClick:function(){return n(e.id)},key:e.id},r.a.createElement(x.a,{padding:"checkbox"},r.a.createElement(D.a,{color:"primary",checked:e.checked})),r.a.createElement(x.a,{component:"th",scope:"row"},e.id),r.a.createElement(x.a,null,e.first),r.a.createElement(x.a,null,e.last),r.a.createElement(x.a,null,e.status))})))},T=n(59),I=n(171),M=n(74),Q=n.n(M),L=n(76);function H(){return(H=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e}).apply(this,arguments)}var N=function(e){var t=e.onDateChange,n=e.selectedDate,a=e.others;return r.a.createElement(T.b,{utils:L.a},r.a.createElement(T.a,H({autoOk:!0,format:"dd/MM/yyyy",disableFuture:!0,value:n,onChange:t,InputProps:{endAdornment:r.a.createElement(I.a,{position:"end"},r.a.createElement(Q.a,{fontSize:"small"}))}},a)))};N.propTypes={handlChange:h.a.func,selectedDate:h.a.objectOf(h.a.any),others:h.a.objectOf(h.a.any)},N.defaultProps={handlChange:function(){},selectedDate:new Date,others:{}};var R=N;function q(e){return(q="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function B(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}function J(e){return(J=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function W(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function z(e,t){return(z=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function U(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function V(e){return e.map(function(e){return function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{},a=Object.keys(n);"function"==typeof Object.getOwnPropertySymbols&&(a=a.concat(Object.getOwnPropertySymbols(n).filter(function(e){return Object.getOwnPropertyDescriptor(n,e).enumerable}))),a.forEach(function(t){U(e,t,n[t])})}return e}({checked:!1},e)})}function G(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1?arguments[1]:void 0,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"Any",a=e.trim().toLowerCase(),r=a.length;return t.filter(function(e){return r>0?"Any"===n?e.first.slice(0,r).toLowerCase()===a||e.last.slice(0,r).toLowerCase()===a:e.status===n&&(e.first.slice(0,r).toLowerCase()===a||e.last.slice(0,r).toLowerCase()===a):"Any"===n||e.status===n})}var K=function(e){function t(e){var n,a,r;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),a=this;var l=(n=!(r=J(t).call(this,e))||"object"!==q(r)&&"function"!=typeof r?W(a):r).props.data,o=null!==l;return n.handleStudentCheck=n.handleStudentCheck.bind(W(n)),n.handleHeaderCheck=n.handleHeaderCheck.bind(W(n)),n.handleDateChange=n.handleDateChange.bind(W(n)),n.handleApplyClick=n.handleApplyClick.bind(W(n)),n.handleFilterStatus=n.handleFilterStatus.bind(W(n)),n.handleFilterQuery=n.handleFilterQuery.bind(W(n)),n.state={data:o?V(l):[],dateOf:new Date,filterQuery:"",filterStatus:"Any",processing:!o},n}var n,a,l;return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&z(e,t)}(t,r.a.Component),n=t,(a=[{key:"handleFilterQuery",value:function(e){var t=e.target.value;this.setState({filterQuery:t})}},{key:"handleFilterStatus",value:function(e){this.setState({filterStatus:e})}},{key:"handleApplyClick",value:function(e){var t=this.state;t.data,t.dateOf}},{key:"handleDateChange",value:function(e){this.setState({dateOf:e})}},{key:"handleHeaderCheck",value:function(){var e=this.state,t=e.data,n=e.filterQuery,a=e.filterStatus,r=G(n,t,a),l=t.some(function(e){return e.checked});r.forEach(function(e){var n=t.findIndex(function(t){return t.id===e.id});-1!==n&&(t[n].checked=!l)}),this.setState({data:t})}},{key:"handleStudentCheck",value:function(e){var t=this.state.data,n=t.findIndex(function(t){return t.id===e});t[n].checked=!t[n].checked,this.setState({data:t})}},{key:"render",value:function(){var e=this.state,t=e.data,n=e.dateOf,a=e.filterQuery,l=e.filterStatus;return r.a.createElement("div",null,r.a.createElement("div",{style:{display:"flex"}},r.a.createElement(u.a,{style:{marginBottom:"22px",marginRight:"12px"},variant:"h6"},"Mark Attendance:"),r.a.createElement("span",null,r.a.createElement(R,{onDateChange:this.handleDateChange,selectedDate:n,others:{fullWidth:!0}}))),r.a.createElement(u.a,{style:{marginBottom:"22px"},color:"textSecondary",variant:"subtitle2"},"Filter Students"),r.a.createElement(w,{onQueryChange:this.handleFilterQuery,onStatusChange:this.handleFilterStatus,query:a}),r.a.createElement("div",{style:{marginTop:"24px"}},r.a.createElement(u.a,{style:{marginBottom:"22px"},color:"textSecondary",variant:"subtitle2"},"Actions"),r.a.createElement(k,{onApplyClick:this.handleApplyClick,disabled:!t.some(function(e){return e.checked})})),r.a.createElement("div",{style:{marginTop:"26px"}},r.a.createElement(u.a,{variant:"subtitle2"},"Student Listing"),r.a.createElement(_,{onHeaderClick:this.handleHeaderCheck,onRowClick:this.handleStudentCheck,data:G(a,t,l),styleProps:{marginTop:"22px"}})))}}])&&B(n.prototype,a),l&&B(n,l),t}(),X=function(){return{dashboard:K}},Y=n(77),Z=Object(Y.a)({palette:{primary:{main:"#0277bd"}},typography:{useNextVariants:!0,fontFamily:["-apple-system","BlinkMacSystemFont",'"Segoe UI"',"Roboto",'"Helvetica Neue"',"Arial","sans-serif",'"Apple Color Emoji"','"Segoe UI Emoji"','"Segoe UI Symbol"'].join(",")}}),$=X();document.querySelectorAll("[".concat("rc-type","]:not([").concat("rc-type",'=""])')).forEach(function(e){var t=$[e.getAttribute("".concat("rc-type"))];o.a.render(r.a.createElement(c.a,{theme:Z},r.a.createElement(t,{data:JSON.parse(e.getAttribute("rc-data")),config:JSON.parse(e.getAttribute("rc-conf"))})),e)})}});