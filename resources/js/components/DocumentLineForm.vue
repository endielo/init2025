<template>
    <div>
        <h3 class="mb-4 text-lg font-semibold">Document Lines</h3>
        <div class="border rounded-md">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead>Product</TableHead>
                        <TableHead>Unit Price</TableHead>
                        <TableHead>Unit</TableHead>
                        <TableHead>Quantity</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Amount</TableHead>
                        <TableHead>Total Amount</TableHead>
                        <TableHead class="w-16 text-center">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="(line, index) in documentLines" :key="index">
                        <TableCell>
                            <Input type="text" v-model="line.product" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="line.unit_price" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="text" v-model="line.unit" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="line.quantity" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="text" v-model="line.description" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="line.amount" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="line.total_amount" class="w-full" />
                        </TableCell>
                        <TableCell class="text-center">
                            <Button
                                variant="ghost"
                                size="icon"
                                @click="removeDocumentLine(index)"
                                classx="text-red-500 hover:bg-red-100"
                                title="Remove"
                            >
                                <TrashIcon class="w-5 h-5" />
                            </Button>
                        </TableCell>
                    </TableRow>
                    <!-- 新增行 -->
                    <TableRow>
                        <TableCell>
                            <Input type="text" v-model="newLine.product" autofocus placeholder="Product" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="newLine.unit_price" placeholder="Unit Price" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="text" v-model="newLine.unit" placeholder="Unit" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="newLine.quantity" placeholder="Quantity" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="text" v-model="newLine.description" placeholder="Description" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="newLine.amount" placeholder="Amount" class="w-full" />
                        </TableCell>
                        <TableCell>
                            <Input type="number" v-model="newLine.total_amount" placeholder="Total Amount" class="w-full" disabled />
                        </TableCell>
                        <TableCell class="text-center">
                            <Button
                                variant="outline"
                                size="icon"
                                @click="addDocumentLine"
                                :class="{'visible':!newLine.product}"
                                title="Add"
                            >
                                <PlusIcon class="w-5 h-5" />
                            </Button>
                        </TableCell>
                    </TableRow>

                    <TableRow >
                        <TableCell colspan="7" class="font-semibold text-right text-gray-700">
                            Total Amount: {{ documentLines.reduce((acc, line) => acc + line.total_amount, 0) }}
                        </TableCell>
                    </TableRow>

                    <TableRow>
                        <TableCell colspan="7" class="text-center">
                            <Button class="w-1/2" @click="addDocumentLine">Add Line</Button>
                        </TableCell>

                    </TableRow>
                </TableBody>
            </Table>
        </div>

    </div>
</template>

<script setup lang="ts">
import { ref, defineProps, defineEmits } from "vue";
import { Table, TableHeader, TableRow, TableHead, TableBody, TableCell } from "@/components/ui/table";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { TrashIcon, PlusIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    documentLines: Array,
});
const emit = defineEmits(['update:documentLines']);

const newLine = ref({
    document_id: '',
    product_id: '',
    product: '',
    unit_price: 0,
    unit: '',
    quantity: 0,
    description: '',
    amount: 0,
    total_amount: 0,
});

const addDocumentLine = () => {

        // 添加新的 document line
        emit('update:documentLines', [...props.documentLines, {...newLine.value}]);

        // 重置 new line 的值
        newLine.value = {
            document_id: '',
            product_id: '',
            product: '',
            unit_price: 0,
            unit: '',
            quantity: 0,
            description: '',
            amount: 0,
            total_amount: 0,
        };
     
};


const removeDocumentLine = (index: number) => {
    try {
        
        if (index < 0 || index >= props.documentLines.length) {
            console.warn("Invalid index:", index);
            return; 
        }

        const updatedLines = [...props.documentLines];
        updatedLines.splice(index, 1);
        emit('update:documentLines', updatedLines);
    } catch (error) {
        console.error("Error removing document line:", error);
        
    }
};


</script>