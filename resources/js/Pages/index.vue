<script setup>
import { Link, Head } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { router } from "@inertiajs/vue3";
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

    destroy(id) {
      Swal.fire({
        title: "Delete Confirm",
        text: "Do you want to delete this?",
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: "Yes",
        denyButtonText: "No",
        confirmButtonColor: "blue",
      }).then((result) => {
        /* Read more about isConfirmed */
        if (result.isConfirmed) {
          router.delete("/" + id);
        }
      });
    },
  },

  created() {
    this.showAlert();
  },

  unmounted() {
    this.showAlert();
  },

  updated() {
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
              class="text-info text-decoration-none me-2 mt-2"
              >Show</Link
            >
            <Link
              :href="`/edit/${customer.id}`"
              class="text-warning text-decoration-none me-2 mt-2"
              >Edit</Link
            >
            <Link
              href="#"
              @click.prevent="destroy(customer.id)"
              class="text-danger text-decoration-none"
              >Delete</Link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
