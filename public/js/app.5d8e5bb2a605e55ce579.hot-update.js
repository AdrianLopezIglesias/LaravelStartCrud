"use strict";
self["webpackHotUpdate"]("/js/app",{

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/pug-plain-loader/index.js!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pacientes/Paciente.vue?vue&type=template&id=a68ffb2e&lang=pug&":
/*!********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/pug-plain-loader/index.js!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pacientes/Paciente.vue?vue&type=template&id=a68ffb2e&lang=pug& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      { staticClass: "container-fluid" },
      [
        _c("h1", [_vm._v("Paciente")]),
        _c("div"),
        _c(
          "v-card",
          [
            _c(
              "v-tabs",
              { attrs: { "background-color": "teal", dark: "", vertical: "" } },
              [
                _c("v-tabs-slider", { attrs: { color: "teal" } }),
                _c("v-tab", [_vm._v("Agenda")]),
                _c("v-tab", [_vm._v("Datos personales")]),
                _c("v-tab", [_vm._v("Contrataciones")]),
                _c("v-tab", [_vm._v("Comunicaciones")]),
                _c("v-tab", [_vm._v("Datos comerciales")]),
                _c(
                  "v-tab-item",
                  [
                    _c(
                      "v-card",
                      { attrs: { flat: "" } },
                      [_c("v-card-text", [_c("PacienteAgenda")], 1)],
                      1
                    ),
                  ],
                  1
                ),
                _c(
                  "v-tab-item",
                  { attrs: { flat: "" } },
                  [
                    _c(
                      "v-card",
                      [
                        _c(
                          "v-card-text",
                          [
                            _c("PacienteDatosPersonales", {
                              attrs: { paciente: _vm.$store.state.paciente },
                            }),
                          ],
                          1
                        ),
                      ],
                      1
                    ),
                  ],
                  1
                ),
                _c(
                  "v-tab-item",
                  { attrs: { flat: "" } },
                  [
                    _c(
                      "v-card",
                      [
                        _c(
                          "v-card-text",
                          [
                            _c("PacienteContrataciones"),
                            _c("PacienteDatosPersonales", {
                              attrs: { paciente: _vm.$store.state.paciente },
                            }),
                          ],
                          1
                        ),
                      ],
                      1
                    ),
                  ],
                  1
                ),
              ],
              1
            ),
          ],
          1
        ),
      ],
      1
    ),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("ca344bc47e9c2f936e68")
/******/ })();
/******/ 
/******/ }
);