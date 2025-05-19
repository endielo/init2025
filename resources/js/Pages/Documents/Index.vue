<template>
    <Head title="Documents" />
    <div class="container py-10 mx-auto">

        <div class="flex items-center justify-between mb-5">
            <h1 class="mb-5 text-3xl font-bold">Documents</h1>
            <Button >
                <Link href="/documents/create" class="text-white">
                    Create
                </Link>
            </Button>

        </div>

        <div class="border rounded-md">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]">Ref</TableHead>
                        <TableHead>Customer ID</TableHead>
                        <TableHead>Type</TableHead>
                        <TableHead>Status</TableHead>
                        <TableHead>Date</TableHead>
                        <TableHead>Due Date</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Total Amount</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow
                        v-for="document in documents.data"
                        :key="document.id"
                    >
                        <TableCell class="font-medium">{{
                            document.ref
                        }}</TableCell>
                        <TableCell>{{ document.customer_id }}</TableCell>
                        <TableCell>{{ document.type }}</TableCell>
                        <TableCell>{{ document.status }}</TableCell>
                        <TableCell>{{ document.date }}</TableCell>
                        <TableCell>{{ document.due_date }}</TableCell>
                        <TableCell>{{ document.description }}</TableCell>
                        <TableCell>{{ document.total_amount }}</TableCell>
                        <TableCell class="flex justify-end space-x-2">
                            <Button @click="editDocument(document.id)" variant="edit">Edit</Button>
                            <Button @click="deleteDocument(document.id)" variant="delete">Delete</Button>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>

        <Paginator class="mt-5" :data="documents"/>
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
    documents: {
        type: Object,
        required: true,
    },
});

const editDocument = (id) => {
    router.visit(`/documents/${id}/edit`);
};

const deleteDocument = (id) => {
    if (confirm("Are you sure you want to delete this document?")) {
        router.delete(`/documents/${id}`);
    }
};

</script>