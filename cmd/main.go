package main

import (
	"fmt"
	"inventory/internal/models"
	"inventory/internal/services"
)

func main() {
	fmt.Println("Inventory manager")

	inventory := services.NewInventory()

	items := []models.Item{
		{Id: 1, Name: "Laptop", Quantity: 10, Price: 799.90},
		{Id: 2, Name: "Smartphone", Quantity: 5, Price: 599.90},
		{Id: 3, Name: "Headset", Quantity: 15, Price: 49.90},
	}

	for _, i := range items {
		if err := inventory.AddItem(i, "ggko"); err != nil {
			fmt.Println(err)
			continue
		}
	}

	for _, i := range inventory.ListItems() {
		fmt.Println(i.Info())
	}

	fmt.Println()

	inventory.RemoveItem(1, 5, "ggko")

	fmt.Println()

	for _, l := range inventory.Logs() {
		fmt.Println(l.Info())
	}

	fmt.Println()

	fmt.Println(inventory.CalculateTotalCost())

	fmt.Println()

	itemsSearch, err := services.FindBy(items, func(item models.Item) bool {
		return (item.Price > 0.00 && item.Price < 500.00)
	})

	if err != nil {
		fmt.Println(err)
	}

	for _, i := range itemsSearch {
		fmt.Println(i.Info())
	}

	fmt.Println()

	supplier1 := services.Supplier{
		CNPJ:    "11111111111111",
		Contact: "2222222222",
		City:    "Sao Paulo",
	}

	fmt.Println(supplier1.GetInfo())
}
