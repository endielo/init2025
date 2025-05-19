<template>
    <div class="container p-4 mx-auto">
        <Head title="編輯客戶" />
        <CustomerForm :form="form" @submit="submit" :isEdit="true" />
    </div>
</template>

<script setup lang="ts">
import CustomerForm from "./CustomerForm.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { defineProps } from "vue";

const props = defineProps({
    customer: Object,
});

const form = useForm({
    name: props.customer.name,
    attn: props.customer.attn,
    address: props.customer.address,
    tel: props.customer.tel,
    fax: props.customer.fax,
    email: props.customer.email,
    remark: props.customer.remark,
});

const submit = () => {
    form.put(route("customers.update", props.customer.id));
};
</script>
