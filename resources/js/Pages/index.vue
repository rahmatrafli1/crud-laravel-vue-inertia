<script setup>
import { Link, Head } from "@inertiajs/vue3";
</script>
<script>
export default {
  props: {
    customers: Array,
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
