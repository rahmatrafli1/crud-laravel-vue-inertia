<script setup>
import { Link, Head } from "@inertiajs/vue3";
import Swal from "sweetalert2";
</script>
<script>
export default {
  props: {
    customers: Array,
  },

  methods: {
    showAlert() {
      if (this.$page.props.flash.message) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          },
        });
        Toast.fire({
          icon: "success",
          title: this.$page.props.flash.message,
        });
      }
    },
  },

  created() {
    this.showAlert();
  },
};
</script>

<template>
  <Head title="Home" />
  <div class="container mt-3">
    <Link href="/create" class="btn btn-success mb-3">Add Customer</Link>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(customer, index) in customers" :key="customer">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ customer.name }}</td>
          <td>
            <Link
              :href="`/${customer.id}`"
              class="text-info text-decoration-none"
              >Show</Link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
