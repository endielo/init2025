<template>
    <form @submit.prevent="emit('submit')" class="w-2/3 space-y-6">
        <div class="grid gap-2">
            <Label for="name">Name</Label>
            <Input
                id="name"
                type="text"
                autofocus
                :tabindex="1"
                autocomplete="name"
                v-model="form.name"
            />
            <InputError :message="form.errors.name" />
        </div>

        <div class="grid gap-2">
            <Label for="attn">Attn</Label>
            <Input
                id="attn"
                type="text"
                :tabindex="2"
                autocomplete="attn"
                v-model="form.attn"
            />
            <InputError :message="form.errors.attn" />
        </div>

        <div class="grid gap-2">
            <Label for="address">Address</Label>
            <Textarea
                id="address"
                type="text"
                :tabindex="3"
                autocomplete="address"
                v-model="form.address"
            />
            <InputError :message="form.errors.address" />
        </div>

        <div class="grid gap-2">
            <Label for="tel">Tel</Label>
            <Input
                id="tel"
                type="text"
                :tabindex="4"
                autocomplete="tel"
                v-model="form.tel"
            />
            <InputError :message="form.errors.tel" />
        </div>

        <div class="grid gap-2">
            <Label for="fax">Fax</Label>
            <Input
                id="fax"
                type="text"
                :tabindex="5"
                autocomplete="fax"
                v-model="form.fax"
            />
            <InputError :message="form.errors.fax" />
        </div>

        <div class="grid gap-2">
            <Label for="email">Email</Label>
            <Input
                id="email"
                type="email"
                :tabindex="6"
                autocomplete="email"
                v-model="form.email"
            />
            <InputError :message="form.errors.email" />
        </div>
        <div class="grid gap-2">
            <Label for="remark">Remark</Label>
            <Textarea
                id="remark"
                type="text"
                :tabindex="7"
                autocomplete="remark"
                v-model="form.remark"
            />
            <InputError :message="form.errors.remark" />
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
