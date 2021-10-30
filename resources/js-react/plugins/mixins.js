import Vue from "vue";
import { $api } from "../api/api";

Vue.mixin({
  computed: {
    $api: () => $api
  }
});