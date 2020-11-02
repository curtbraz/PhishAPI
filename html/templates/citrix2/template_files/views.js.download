var login = new function()
{
    this._view_name = "gateway_login_view";  //This view creates outer markup of pages and then calls loads other views.
    
    this.do_action_on_load = function()
    {
		login._load();
    };
    
    this._load = function()
    {   
        if(rdx.utils.is_not_empty(this._view_name))
        {
            try
            {
                var view_definition = rdx.utils.get_view(this._view_name);
                new rdx.base_view($(document.body), view_definition).prepare_view();
				
            }
            catch(err)
            {
                rdx.message_box.error(rdx.utils.get_detailed_error_message(err));
                return;
            }
        }
	};
};

var logout = new function()
{
    this._view_name = "logout_view";
    
    this.do_action_on_load = function()
    {
		logout._load();
    };
    
    this._load = function()
    {   
        if(rdx.utils.is_not_empty(this._view_name))
        {
            try
            {
                var view_definition = rdx.utils.get_view(this._view_name);
                new rdx.base_view($(document.body), view_definition).prepare_view();
				
            }
            catch(err)
            {
                rdx.message_box.error(rdx.utils.get_detailed_error_message(err));
                return;
            }
        }
	};
};

var logout_url;

var choices = new function()
{
    this._view_name = "client_choices_view";
    
    this.do_action_on_load = function()
    {
		choices._load();
    };
    
    this._load = function()
    {   
        if(rdx.utils.is_not_empty(this._view_name))
        {
            try
            {
                var view_definition = rdx.utils.get_view(this._view_name);
                new rdx.base_view($(document.body), view_definition).prepare_view();
				
            }
            catch(err)
            {
                rdx.message_box.error(rdx.utils.get_detailed_error_message(err));
                return;
            }
        }
	};
};
rdx.views =
{
	header_view:
	{
		type: rdx.view_constants.HEADER_VIEW,
		resource_properties: {},
		view_properties:
		{
			stand_alone:true
		}
	},
	
	
	gateway_login_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.gateway_login_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		
		}
	},
	
	gateway_login_form_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.gateway_login_form_view",  
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
						
				}
			}
		],
		
		view_properties:
		{
		
		}
	},
	
	tmindex_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.tmindex_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
						
				}
			}
		],
		
		view_properties:
		{
		
		}
	},
	epa_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.epa_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},

	epa_errorpage_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.epa_errorpage_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	vpn_process_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.vpn_process_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	vpn_process_linux_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.vpn_process_linux_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					

				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	vpn_process_mac_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.vpn_process_mac_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	client_choices_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.client_choices_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	postepa_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.postepa_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	services_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.services_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	},
	
	logout_view:
	{
		type: rdx.view_constants.CUSTOM_VIEW,
		view_class_name: "rdx.logout_view",
		response_callback: new rdx.callback(function(params){params.resume({});}), 
		resource_properties:
		[
			{
				form_fields:
				{
					
				}
			}
		],
		
		view_properties:
		{
		}
	}
	
	
};