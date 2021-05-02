<template>

</template>

<script>
export default {
	data() {
		return {
			open: false,
			dimmer: true,
			right: false
		};
	},
	methods: {
		toggle() {
			this.open = !this.open;
		}
	}
};
</script>

<style>

</style>
