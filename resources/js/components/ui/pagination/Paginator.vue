<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import { Pagination, PaginationContent, PaginationItem, PaginationPrevious, PaginationNext } from '@/components/ui/pagination';

defineProps<{
    data: {
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
        links: Array<{
            url: string | null;
            label: string;
            active: boolean;
        }>;
        prev_page_url?: string | null;
        next_page_url?: string | null;
    };
    class?: string;
}>();

const goToPage = (url: string | null) => {
    if (!url) return;
    router.visit(url, {
        preserveState: true,
        preserveScroll: true,
    });
};
</script>

<template>
    <Pagination
        :class="$props.class"
        :items-per-page="data.per_page"
        :page="data.current_page"
        :total="data.total"
        v-if="data && data.links && data.links.length > 3"
    >
        <PaginationContent>
            <PaginationPrevious
                :disabled="!data.prev_page_url"
                @click="goToPage(data.prev_page_url)"
            />
            <template v-for="(link, index) in data.links" :key="index">
                <PaginationItem
                    v-if="link.label !== '...' "
                    :value="index + 1"
                    :is-active="link.active"
                    class="hover:bg-secondary"
                    @click="goToPage(link.url)"
                >
                    <span v-html="link.label" />
                </PaginationItem>
                <PaginationItem v-else :value="index + 1" disabled>
                    <span v-html="link.label" />
                </PaginationItem>
            </template>
            <PaginationNext
                :disabled="!data.next_page_url"
                @click="goToPage(data.next_page_url)"
            />
        </PaginationContent>
    </Pagination>
</template>
