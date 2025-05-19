<template>
    <form @submit.prevent="emit('submit')" class="w-2/3 space-y-6">
        <div class="grid gap-2">
            <Label for="ref">Ref</Label>
            <Input
                id="ref"
                type="text"
                autofocus
                :tabindex="1"
                autocomplete="ref"
                v-model="form.ref"
            />
            <InputError :message="form.errors.ref" />
        </div>

        <div class="grid gap-2">
            <Label for="customer_id">Customer ID</Label>
            <Input
                id="customer_id"
                type="number"
                :tabindex="2"
                autocomplete="customer_id"
                v-model="form.customer_id"
            />
            <InputError :message="form.errors.customer_id" />
        </div>

        <div class="grid gap-2">
            <Label for="type">Type</Label>
            <Input
                id="type"
                type="text"
                :tabindex="3"
                autocomplete="type"
                v-model="form.type"
            />
            <InputError :message="form.errors.type" />
        </div>

        <div class="grid gap-2">
            <Label for="status">Status</Label>
            <Input
                id="status"
                type="text"
                :tabindex="4"
                autocomplete="status"
                v-model="form.status"
            />
            <InputError :message="form.errors.status" />
        </div>

        <div class="grid gap-2">
            <Label for="date">Date</Label>
            <Input
                id="date"
                type="date"
                :tabindex="5"
                autocomplete="date"
                v-model="form.date"
            />
            <InputError :message="form.errors.date" />
        </div>

        <div class="grid gap-2">
            <Label for="due_date">Due Date</Label>
            <Input
                id="due_date"
                type="date"
                :tabindex="6"
                autocomplete="due_date"
                v-model="form.due_date"
            />
            <InputError :message="form.errors.due_date" />
        </div>

        <div class="grid gap-2">
            <Label for="description">Description</Label>
            <Textarea
                id="description"
                type="text"
                :tabindex="7"
                autocomplete="description"
                v-model="form.description"
            />
            <InputError :message="form.errors.description" />
        </div>

        <div class="grid gap-2">
            <Label for="total_amount">Total Amount</Label>
            <Input
                id="total_amount"
                type="number"
                :tabindex="8"
                autocomplete="total_amount"
                v-model="form.total_amount"
            />
            <InputError :message="form.errors.total_amount" />
        </div>

        <Button type="submit">{{ isEdit ? "Update" : "Add" }}</Button>
    </form>
</template>

<script setup lang="ts">
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import InputError from "@/components/ui/InputError.vue";
import { defineProps, defineEmits } from "vue";

const props = defineProps({
    form: Object,
    isEdit: Boolean,
});
const emit = defineEmits(["submit"]);
</script>