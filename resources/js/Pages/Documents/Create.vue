<template>
    <div class="container p-4 mx-auto">

        <Head title="Create Document" />
        <DocumentForm  :form="form" @submit="submit" />
        <DocumentLineForm :documentLines="form.document_lines" @update:documentLines="updateDocumentLines" />
    </div>
</template>

<script setup lang="ts">
import DocumentForm from './DocumentForm.vue';
import DocumentLineForm from '@/components/DocumentLineForm.vue';
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
    document_lines: [],
});

const submit = () => {
  form.post(route('documents.store'), {
        preserveScroll: true,
    });
};

const updateDocumentLines = (lines: any[]) => {
    form.document_lines = lines;
};
</script>