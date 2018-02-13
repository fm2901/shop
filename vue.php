<div id="app">
	<ul>
		<li v-for="prod in product">
			{{ prod }}
		</li>
	</ul>
</div>
<script src="https://unpkg.com/vue"></script>
<script>
	const app = new Vue({
		el: '#app',
		data:{
			product: [
				'Boots',
				'Socks',
				'Jacket'
			]
		}
	})
</script>
