<template>
	<div class="calc">
		<form v-on:submit.prevent="onSubmit" name="mtg_calc" id="mtg_calc" class="form">
			<div class="form-row">
				<label for="principal">Principal (in USD)</label>
				<input v-model.lazy.number="values.principal" type="number" step="1" min="1" id="principal" name="principal" class="form-input" placeholder="100,000" required />
			</div>
			<div class="form-row">
				<label for="apr">APR</label>
				<input v-model.lazy.number="values.apr" type="number" step="0.05" min="1" id="apr" name="apr" class="form-input" placeholder="4.25" required />
			</div>
			<div class="form-row">
				<label for="term">Term Length (in Years)</label>
				<input v-model.lazy.number="values.term" type="number" step="1" min="1" max="360" id="term" name="term" class="form-input" placeholder="30" required />
			</div>
			<div class="form-row">
				<label for="payment">Monthly Payment (in USD)</label>
				<input v-model="values.payment" type="text" id="payment" name="payment" class="form-input" placeholder="0.00" disabled="disabled" />
			</div>
			<div class="message">{{message}}</div>
			<input type="submit" name="submit" value="Submit" />
		</form>
	</div>
</template>
<script>
	import axios from 'axios';
    export default {
        data() {
        	return {
        		values: {
        			principal: '',
        			apr: '',
        			term: '',
        			payment: ''
        		},
        		success: '',
        		message: ''
        	}
        },
        methods: {
        	onSubmit(event) {
        		this.message = '';
        		var pmt = this.values.principal * (this.values.apr / 1200) / (1 - (Math.pow(1/(1 + (this.values.apr / 1200)), (this.values.term*12))));
        		this.values.payment = pmt.toFixed(2);
        		axios.post('/calc', {
        			values: this.values,
        		})
        		.then(function(response) {
                    console.log(response);
        			console.log(response.data.success);
        			if (typeof(response.data.success) !== 'undefined') {
        				this.success = response.data.success;
        				switch(this.success) {
        					case true:
        						this.message = 'Success!';
        						break;
        					default:
        						this.message = 'Failure :(';
        						break;
        				}
        			}
        			else {
        				this.message = 'Failure :(';
        			}
        		}.bind(this))
        		.catch(function(error) {
        			this.message = error;
        		})
        	}
        }
    }
</script>