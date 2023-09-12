<script setup>
const props = defineProps({
    modelValue: [String, Number],
    label: [String, Number],
    placeholder: [String, Number],
    required: Boolean,
    type: {
        type: String,
        default: 'text'
    },
    error: {
        required: true
    }
});

defineEmits(['update:modelValue']);
</script>

<template>
    <label :for="label.replace(/ /g, '')" class="block mb-2 text-sm font-medium text-white dark:text-white">
        <slot v-if="label"/>
        {{ label }}
    </label>
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :type="type"
           :id="label.replace(/ /g, '')" :placeholder="placeholder" :required="required"
           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
    <div v-show="error" class="text-red-800 font-bold">{{error}}</div>
</template>
