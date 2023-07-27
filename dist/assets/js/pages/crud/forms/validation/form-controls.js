
var KTFormControls = function () {
	var _initDemo1 = function () {
		FormValidation.formValidation(
			document.getElementById('kt_form_1'),
			{
				fields: {
				    Name: {
						validators: {
							notEmpty: {
								message: 'lr is required'
							},
							Name: {
								message: 'The value is not a valid lr '
							}
						}
					},
		
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},

					url: {
						validators: {
							notEmpty: {
								message: 'Website URL is required'
							},
							uri: {
								message: 'The website address is not valid'
							}
						}
					},

					digits: {
						validators: {
							notEmpty: {
								message: 'Digits is required'
							},
							digits: {
								message: 'The velue is not a valid digits'
							}
						}
					},

					creditcard: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},

					phone: {
						validators: {
							notEmpty: {
								message: 'US phone number is required'
							},
							phone: {
								country: 'US',
								message: 'The value is not a valid US phone number'
							}
						}
					},

					option: {
						validators: {
							notEmpty: {
								message: 'Please select an option'
							}
						}
					},

					options: {
						validators: {
							choice: {
								min:2,
								max:5,
								message: 'Please select at least 2 and maximum 5 options'
							}
						}
					},

					memo: {
						validators: {
							notEmpty: {
								message: 'Please enter memo text'
							},
							stringLength: {
								min:50,
								max:100,
								message: 'Please enter a menu within text length range 50 and 100'
							}
						}
					},

					checkbox: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly check this'
							}
						}
					},

					checkboxes: {
						validators: {
							choice: {
								min:2,
								max:5,
								message: 'Please check at least 1 and maximum 2 options'
							}
						}
					},

					radios: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly check this'
							}
						}
					},
					
					
					
					
				
				// 	booking_type: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Please select an Booking type'
				// 			}
				// 		}
				// 	},
					lr_no: {
						validators: {
							notEmpty: {
								message: 'LR No is required'
							},
							lr_no: {
								message: 'The value is not a valid LR No'
							}
						}
					},
					
				// 	railway_no: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Railway no is required'
				// 			},
				// 			railway_no: {
				// 				message: 'The value is not a valid Railway no'
				// 			}
				// 		}
				// 	},	
				// consignment_type: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Please select an Consignment Type'
				// 			}
				// 		}
				// 	},
				// 		invoice_type: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Please select an Invoice Type'
				// 			}
				// 		}
				// 	},
				// 		mode_transport: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Please select an Mode Transport'
				// 			}
				// 		}
				// 	},
					to_name: {
						validators: {
							notEmpty: {
								message: 'To name is required'
							},
							to_name: {
								message: 'The value is not a valid To name'
							}
						}
					},
					to_contact: {
						validators: {
							notEmpty: {
								message: 'To contact is required'
							},
							to_contact: {
								message: 'The value is not a valid To contact'
							}
						}
					},
					from_name: {
						validators: {
							notEmpty: {
								message: 'From Name is required'
							},
							to_contact: {
								message: 'The value is not a valid From Name'
							}
						}
					},
					from_contact: {
						validators: {
							notEmpty: {
								message: 'From contact is required'
							},
							from_contact: {
								message: 'The value is not a valid From contact'
							}
						}
					},
				// 		agent: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Please select an Agent'
				// 			}
				// 		}
				// 	},
				// 	agent_name: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'To contact is required'
				// 			},
				// 			agent_name: {
				// 				message: 'The value is not a valid agent name'
				// 			}
				// 		}
				// 	},
				// 	agent_contact: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Agent contact is required'
				// 			},
				// 			agent_contact: {
				// 				message: 'The value is not a valid agent contact'
				// 			}
				// 		}
				// 	},
					delivery_message: {
						validators: {
							notEmpty: {
								message: 'Delivery Message is required'
							},
							delivery_message: {
								message: 'The value is not a valid Delivery Message'
							}
						}
					},
					
					quantity_kg: {
						validators: {
							notEmpty: {
								message: 'Quantity in KG is required'
							},
							quantity_kg: {
								message: 'The value is not a valid Quantity in KG'
							}
						}
					},
					quantity_nos: {
						validators: {
							notEmpty: {
								message: 'Quantity in Nos is required'
							},
							quantity_nos: {
								message: 'The value is not a valid Quantity in Nos'
							}
						}
					},
					rate: {
						validators: {
							notEmpty: {
								message: 'rate is required'
							},
							rate: {
								message: 'The value is not a valid rate'
							}
						}
					},
				// 	cgst: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'cgst is required'
				// 			},
				// 			cgst: {
				// 				message: 'The value is not a valid cgst'
				// 			}
				// 		}
				// 	},
				// 	sgst: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'sgst is required'
				// 			},
				// 			sgst: {
				// 				message: 'The value is not a valid sgst'
				// 			}
				// 		}
				// 	},
				// 	igst: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'igst is required'
				// 			},
				// 			igst: {
				// 				message: 'The value is not a valid igst'
				// 			}
				// 		}
				// 	},
					// 	lorry_no: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Lorry No is required'
				// 			},
				// 			lorry_no: {
				// 				message: 'The value is not a valid Lorry No'
				// 			}
				// 		}
				// 	},	
				// 	train_type: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Train Type is required'
				// 			},
				// 			train_type: {
				// 				message: 'The value is not a valid Train Type'
				// 			}
				// 		}
				// 	},
				// 	RR_No: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'RR No is required'
				// 			},
				// 			RR_No: {
				// 				message: 'The value is not a valid RR No'
				// 			}
				// 		}
				// 	},
				// 	train_No: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Train No is required'
				// 			},
				// 			train_No: {
				// 				message: 'The value is not a valid Train No'
				// 			}
				// 		}
				// 	},	
				// 	flight_no: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Flight No is required'
				// 			},
				// 			flight_no: {
				// 				message: 'The value is not a valid Flight No'
				// 			}
				// 		}
				// 	},
				// 	internal_info: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Internal Info  is required'
				// 			},
				// 			internal_info: {
				// 				message: 'The value is not a valid Internal Info '
				// 			}
				// 		}
				// 	},	
				// 	eway_bill: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Eway Bill No is required'
				// 			},
				// 			eway_bill: {
				// 				message: 'The value is not a valid Eway Bill No'
				// 			}
				// 		}
				// 	},
				// 		no_stop: {
				// 		validators: {
				// 			choice: {
				// 				min:2,
				// 				max:5,
				// 				message: 'Please select at least 2 and maximum 5 options'
				// 			}
				// 		}
				// 	},
				// 	destination: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Destination is required'
				// 			},
				// 			destination: {
				// 				message: 'The value is not a valid Destination'
				// 			}
				// 		}
				// 	},
				// 	material_name: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Material Name is required'
				// 			},
				// 			material_name: {
				// 				message: 'The value is not a valid Material Name'
				// 			}
				// 		}
				// 	},
				// 	material_name: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Material Name is required'
				// 			},
				// 			material_name: {
				// 				message: 'The value is not a valid Material Name'
				// 			}
				// 		}
				// 	},
					
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				}
			}
		);
	}

	var _initDemo2 = function () {
		FormValidation.formValidation(
			document.getElementById('kt_form_2'),
			{
				fields: {
					billing_card_name: {
						validators: {
							notEmpty: {
								message: 'Card Holder Name is required'
							}
						}
					},
					billing_card_number: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					billing_card_exp_month: {
						validators: {
							notEmpty: {
								message: 'Expiry Month is required'
							}
						}
					},
					billing_card_exp_year: {
						validators: {
							notEmpty: {
								message: 'Expiry Year is required'
							}
						}
					},
					billing_card_cvv: {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'The CVV velue is not a valid digits'
							}
						}
					},

					billing_address_1: {
						validators: {
							notEmpty: {
								message: 'Address 1 is required'
							}
						}
					},
					billing_city: {
						validators: {
							notEmpty: {
								message: 'City 1 is required'
							}
						}
					},
					billing_state: {
						validators: {
							notEmpty: {
								message: 'State 1 is required'
							}
						}
					},
					billing_zip: {
						validators: {
							notEmpty: {
								message: 'Zip Code is required'
							},
							zipCode: {
								country: 'US',
								message: 'The Zip Code value is invalid'
							}
						}
					},

					billing_delivery: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly select delivery type'
							}
						}
					},
					package: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly select package type'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		);
	}

	return {
		// public functions
		init: function() {
			_initDemo1();
			_initDemo2();
		}
	};
}();

jQuery(document).ready(function() {
	KTFormControls.init();
});
