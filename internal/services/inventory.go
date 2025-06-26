package services

import (
	"fmt"
	"inventory/internal/models"
	"strconv"
	"time"
)

type Inverntory struct {
	items map[string]models.Item
	logs  []models.Log
}

func (i *Inverntory) AddItem(item models.Item, user string) error {
	if item.Quantity <= 0 {
		return fmt.Errorf("item quantity must be greater than zero")
	}

	existingItem, exists := i.items[strconv.Itoa(item.Id)]
	if exists {
		item.Quantity += existingItem.Quantity
	}

	i.items[strconv.Itoa(item.Id)] = item

	i.logs = append(i.logs, models.Log{
		Timestamp: time.Now(),
		Action:    "inventory entry",
		User:      user,
		ItemId:    item.Id,
		Quantity:  item.Quantity,
		Reason:    "Added item to inventory",
	})

	return nil
}

func (i *Inverntory) ListItems() []models.Item {
	var itemList []models.Item
	for _, i := range i.items {
		itemList = append(itemList, i)
	}
	return itemList
}

func (i *Inverntory) Logs() []models.Log {
	return i.logs
}

func (i *Inverntory) CalculateTotalCost() float64 {
	var TotalCost float64
	for _, i := range i.items {
		TotalCost += float64(i.Quantity) * i.Price
	}
	return TotalCost
}

func NewInventory() *Inverntory {
	return &Inverntory{
		items: make(map[string]models.Item),
		logs:  []models.Log{},
	}
}
