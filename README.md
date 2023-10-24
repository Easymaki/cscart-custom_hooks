# CS-Cart Custom Hooks Module

![CS-Cart Logo](https://www.cs-cart.ru/shopping-cart/free/images/logos/cscart_logo_color@2x.png)

## Description

With this modification you will be able to install custom hooks for cs-cart, which gives you the ability to modify the core of cs-cart without affecting it, but only by adding custom hooks that you specify in the json file inside your module.

## Install

1. Clone this repository:

```
git clone https://github.com/easymaki/cscart-custom_hooks.git
```

2. Upload the folder to the `app/addons` directory of your CS-Cart store.

3. In the CS-Cart admin panel, go to "Add-ons" and find "[NS] Custom hooks". Install and activate the module.

4. Done! Now you can add custom hooks to your store.

## Use

To add a custom hook, follow these steps:

1. In the directory of your module, create the file "hooks.json"

2. Fill in the json file following the example:

```
 {
    "4.17.1": [
        {
            "hook": "test_hook",
            "line": 138,
            "file_path": "app/functions/fn.users.php",
            "args": "$user_id, $fields, $join"
            
        }
    ]
}
```

3. Done! When the module is installed, the custom hooks will be added to the corresponding files.

## Facilitation

If you have suggestions for improving this module, please create an issue or submit a pull request.

## Authors

- Nikita (Easymaki) - nikitacharacter@gmail.com
  
---

*Note: Make sure the module is compatible with your version of CS-Cart before installing.*
