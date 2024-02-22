<template>
  <Head title="Show Data" />
  <div class="container mt-3">
    <h3>{{ customer.name }}</h3>
    <p>Email Address: {{ customer.email }}</p>
    <p>Phone: {{ customer.phone }}</p>
    <Link href="/" class="btn btn-secondary">Back</Link>
  </div>
</template>

<script setup>
import { Link, Head } from "@inertiajs/vue3";
</script>
<script>
export default {
  props: {
    customer: Object,
  },
};
</script>
