<script setup>
import { useForm, router, Link, Head } from "@inertiajs/vue3";

defineProps({
  errors: Object,
});

const form = useForm({
  name: null,
  email: null,
  phone: null,
});

const submit = () => {
  router.post("/store", form);
};
</script>

<template>
  <Head title="Create" />
  <div class="card col-6 offset-3 mt-3">
    <div class="card-header">Create Customer</div>
    <div class="card-body">
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            v-model="form.name"
            autocomplete="off"
          />
          <div class="text-danger text-xs" v-if="errors.name">
            {{ errors.name }}
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            v-model="form.email"
            autocomplete="off"
          />
          <div class="text-danger text-xs" v-if="errors.email">
            {{ errors.email }}
          </div>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input
            type="text"
            class="form-control"
            id="phone"
            name="phone"
            v-model="form.phone"
            autocomplete="off"
          />
          <div class="text-danger text-xs" v-if="errors.phone">
            {{ errors.phone }}
          </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <Link href="/" class="btn btn-secondary">Back</Link>
      </form>
    </div>
  </div>
</template>
