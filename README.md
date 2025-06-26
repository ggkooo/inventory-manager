# ?? Inventory Manager

## ?? Overview

The **Inventory Manager** is a Go-based application designed to manage inventory items, track logs of inventory actions, and handle supplier information. It provides functionalities to add, remove, and list items, calculate total inventory cost, and search for items based on specific criteria. Additionally, it includes supplier management with availability checks.

## ? Features

### ?? Inventory Management
- ? Add items to the inventory.
- ? Remove items from the inventory.
- ?? List all items in the inventory.
- ?? Calculate the total cost of items in the inventory.
- ?? Log all inventory actions (additions and removals).

### ?? Supplier Management
- ??? Store supplier information (CNPJ, contact, city).
- ? Verify item availability based on requested and available quantities.

### ?? Search Functionality
- ?? Search for items using custom criteria.

## ??? Project Structure

```
.gitignore
go.mod
README.md
.vscode/
    settings.json
cmd/
    main.go
internal/
    models/
        item.go
        log.go
    services/
        inventory.go
        supplier.go
```

### ?? Key Components

1. **Models**:
    - `Item`: Represents an inventory item with attributes like ID, name, quantity, and price.
    - `Log`: Represents an action log with details like timestamp, action type, user, item ID, quantity, and reason.

2. **Services**:
    - `Inventory`: Manages inventory operations such as adding, removing, listing items, and calculating total cost.
    - `Supplier`: Handles supplier information and availability checks.

3. **Main Application**:
    - The `main.go` file initializes the inventory, adds sample items, performs operations, and demonstrates the application's functionalities.

## ?? Installation

1. Clone the repository:
    ```sh
    git clone <repository-url>
    cd inventory-manager
    ```

2. Ensure you have Go installed (version 1.24.4 or higher).

3. Run the application:
    ```sh
    go run cmd/main.go
    ```

## ?? Usage

### ? Adding Items
Use the `AddItem` method to add items to the inventory. Each addition is logged.

### ? Removing Items
Use the `RemoveItem` method to remove items from the inventory. Ensure the quantity is valid.

### ?? Listing Items
Use the `ListItems` method to retrieve all items in the inventory.

### ?? Calculating Total Cost
Use the `CalculateTotalCost` method to compute the total value of all items in the inventory.

### ?? Searching Items
Use the `FindBy` function to search for items based on custom criteria.

### ?? Supplier Management
Store supplier details and verify item availability using the `Supplier` struct.

## ??? Example Output

Below is an example of the application's output:

```
Inventory Manager
ID: 1 | Name: Laptop | Quantity: 10 | Price: 799.90
ID: 2 | Name: Smartphone | Quantity: 5 | Price: 599.90
ID: 3 | Name: Headset | Quantity: 15 | Price: 49.90

2023-10-01 12:00:00 | inventory entry | User: ggko | Item ID: 1 | Quantity: 10 | Reason: added item to inventory
2023-10-01 12:00:00 | inventory exit | User: ggko | Item ID: 1 | Quantity: 5 | Reason: removed item from inventory

Total Cost: 12499.50

ID: 3 | Name: Headset | Quantity: 15 | Price: 49.90

CNPJ: 11111111111111 | Contact: 2222222222 | City: Sao Paulo
Available
```

## ?? Contributing

Contributions are welcome! Please follow these steps:

1. ?? Fork the repository.
2. ?? Create a new branch for your feature or bug fix. 
3. ?? Commit your changes and push them to your fork.
4. ?? Submit a pull request.

## ?? License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## ?? Contact

For questions or suggestions, please contact the project maintainer.
