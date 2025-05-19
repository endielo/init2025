
<template>
    <div class="container p-4 mx-auto">
        <Head title="Edit Document" />
        <DocumentForm :form="form" @submit="submit" :isEdit="true" />
        <DocumentLineForm :documentLines="form.document_lines" @update:documentLines="updateDocumentLines" />
    </div>
</template>

<script setup lang="ts">
import DocumentForm from "./DocumentForm.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { defineProps } from "vue";

const props = defineProps({
    document: Object,
});

const form = useForm({
    ref: props.document.ref,
    customer_id: props.document.customer_id,
    type: props.document.type,
    status: props.document.status,
    date: props.document.date,
    due_date: props.document.due_date,
    description: props.document.description,
    total_amount: props.document.total_amount,
});

const submit = () => {
    form.put(route("documents.update", props.document.id), {
        preserveScroll: true,
    });
};

const updateDocumentLines = (lines: any[]) => {
    form.document_lines = lines;
};
</script>