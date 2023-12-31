# CS-Cart Custom Hooks Module

![CS-Cart Logo](https://www.cs-cart.ru/shopping-cart/free/images/logos/cscart_logo_color@2x.png)

## Description

With this modification you will be able to install custom hooks for cs-cart, which gives you the ability to modify the core of cs-cart without affecting it, but only by adding custom hooks that you specify in the json file inside your add-on.

## Install

1. Clone this repository:

```
git clone https://github.com/easymaki/cscart-custom_hooks.git
```
2. Install the add-on in your store using the [instruction](https://docs.cs-cart.com/latest/user_guide/addons/1manage_addons.html).

4. Done! Now you can add custom hooks to your store.

## Use

To add a custom hook in your add-on, follow these steps:

1. In the directory of your add-on, create the file "hooks.json"

2. Fill in the json file following the example:

- `"4.17.1"`: This specifies the CS-Cart version for which the hook is intended. You can have multiple versions with different hooks specified.

- `"hook"`: This is the name of the hook you want to add.

- `"line"`: This indicates the line number where the hook should be added in the specified file.

- `"file_path"`: This is the path to the file from the root directory in your store to which the hook should be added.

- `"args"`: These are the arguments that the hook function expects. They should be specified as a comma-separated string.

Example:

```json
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

3. Done! When the add-on is installed, the custom hooks will be added to the corresponding files.

## Facilitation

If you have suggestions for improving this module, please create an issue or submit a pull request.

## Authors

- Nikita (Easymaki) - nikitacharacter@gmail.com
  
---

*Note: Make sure the module is compatible with your version of CS-Cart before installing.*
