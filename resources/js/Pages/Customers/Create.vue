
<template>
    <div class="container p-4 mx-auto">

        <Head title="新增客戶" />
        <CustomerForm  :form="form" @submit="submit" />
    </div>
    </template>


<script setup lang="ts">
import CustomerForm from './CustomerForm.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    attn: '',
    address: '',
    tel: '',
    fax: '',
    email: '',
    remark: '',
});

const submit = () => {
  form.post(route('customers.store'));
};
</script>

