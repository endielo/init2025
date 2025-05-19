<template>
    <Head title="Customers" />
    <div class="container py-10 mx-auto">
        
        <div class="flex items-center justify-between mb-5">
            <h1 class="mb-5 text-3xl font-bold">Customers</h1>
            <Button >
                <Link href="/customers/create" class="text-white">
                    Create
                </Link>
            </Button>
            
        </div>

        <div class="border rounded-md">
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
                        <TableCell class="flex justify-end space-x-2">
                            <Button @click="editCustomer(customer.id)" variant="edit">Edit</Button>
                            <Button @click="deleteCustomer(customer.id)" variant="delete">Delete</Button>
                        </TableCell>
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
import { Button } from "@/components/ui/button";

const props = defineProps({
    customers: {
        type: Object,
        required: true,
    },
});

const editCustomer = (id) => {
    router.visit(`/customers/${id}/edit`);
};

const deleteCustomer = (id) => {
    if (confirm("Are you sure you want to delete this customer?")) {
        router.delete(`/customers/${id}`);
    }
};

</script>
