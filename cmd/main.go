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

	for _, l := range inventory.Logs() {
		fmt.Println(l.Info())
	}
}
