<template>
    <div class="container p-4 mx-auto">

        <Head title="Create Document" />
        <DocumentForm  :form="form" @submit="submit" />
    </div>
</template>


<script setup lang="ts">
import DocumentForm from './DocumentForm.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    ref: '',
    customer_id: '',
    type: '',
    status: 'draft',
    date: '',
    due_date: '',
    description: '',
    total_amount: 0,
});

const submit = () => {
  form.post(route('documents.store'), {
        preserveScroll: true,
    });
};
</script>