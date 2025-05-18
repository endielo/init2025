<template>
    <Head title="Customers" />
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-5">Customers</h1>
        <div class="rounded-md border">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]">Name</TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead>Attn</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow
                        v-for="customer in customers.data"
                        :key="customer.id"
                    >
                        <TableCell class="font-medium">{{
                            customer.name
                        }}</TableCell>
                        <TableCell>{{ customer.email }}</TableCell>
                        <TableCell>{{ customer.attn }}</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>

        <Paginator class="mt-5" :data="customers"/>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from "@/components/ui/table";

import Paginator from "@/components/ui/pagination/Paginator.vue";


const props = defineProps({
    customers: {
        type: Object,
        required: true,
    },
});


</script>
