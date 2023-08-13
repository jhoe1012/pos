"use strict";(self.webpackChunknexopos_4x=self.webpackChunknexopos_4x||[]).push([[203],{7203:(e,t,s)=>{s.r(t),s.d(t,{default:()=>l});var i=s(2277),n=s(4679),r=s(7700),o=s(3632);const a={name:"ns-login",props:["showRecoveryLink","showRegisterButton"],data:function(){return{fields:[],xXsrfToken:null,validation:new n.Z,isSubmitting:!1}},mounted:function(){var e=this;(0,i.D)([r.ih.get("/api/nexopos/v4/fields/ns.login"),r.ih.get("/sanctum/csrf-cookie")]).subscribe({next:function(t){e.fields=e.validation.createFields(t[0]),e.xXsrfToken=r.ih.response.config.headers["X-XSRF-TOKEN"],setTimeout((function(){return r.kq.doAction("ns-login-mounted",e)}),100)},error:function(e){r.kX.error(e.message||(0,o.__)("An unexpected error occurred."),(0,o.__)("OK"),{duration:0}).subscribe()}})},methods:{__:o.__,signIn:function(){var e=this;if(!this.validation.validateFields(this.fields))return r.kX.error((0,o.__)("Unable to proceed the form is not valid.")).subscribe();this.validation.disableFields(this.fields),r.kq.applyFilters("ns-login-submit",!0)&&(this.isSubmitting=!0,r.ih.post("/auth/sign-in",this.validation.getValue(this.fields),{headers:{"X-XSRF-TOKEN":this.xXsrfToken}}).subscribe({next:function(e){document.location=e.data.redirectTo},error:function(t){e.isSubmitting=!1,e.validation.enableFields(e.fields),t.data&&e.validation.triggerFieldsErrors(e.fields,t.data),r.kX.error(t.message).subscribe()}}))}}};const l=(0,s(1900).Z)(a,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"ns-box rounded shadow overflow-hidden transition-all duration-100"},[s("div",{staticClass:"ns-box-body"},[s("div",{staticClass:"p-3 -my-2"},[e.fields.length>0?s("div",{staticClass:"py-2 fade-in-entrance anim-duration-300",on:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.signIn()}}},e._l(e.fields,(function(e,t){return s("ns-field",{key:t,attrs:{field:e}})})),1):e._e()]),e._v(" "),0===e.fields.length?s("div",{staticClass:"flex items-center justify-center py-10"},[s("ns-spinner",{attrs:{border:"4",size:"16"}})],1):e._e(),e._v(" "),e.showRecoveryLink?s("div",{staticClass:"flex w-full items-center justify-center py-4"},[s("a",{staticClass:"hover:underline text-blue-600 text-sm",attrs:{href:"/password-lost"}},[e._v(e._s(e.__("Password Forgotten ?")))])]):e._e()]),e._v(" "),s("div",{staticClass:"flex justify-between items-center border-t ns-box-footer p-3"},[s("div",[s("ns-button",{staticClass:"justify-between",attrs:{type:"info"},on:{click:function(t){return e.signIn()}}},[e.isSubitting?s("ns-spinner",{staticClass:"mr-2",attrs:{size:"6",border:"2"}}):e._e(),e._v(" "),[e._v(e._s(e.__("Sign In")))]],2)],1),e._v(" "),e.showRegisterButton?s("div",[s("ns-button",{attrs:{link:!0,href:"/sign-up",type:"success"}},[e._v(e._s(e.__("Register")))])],1):e._e()])])}),[],!1,null,null,null).exports}}]);