package services

import (
	"fmt"
	"inventory/internal/models"
	"strconv"
)

type Inverntory struct {
	items map[string]models.Item
	logs  models.Log
}

func (i *Inverntory) AddItem(item models.Item) error {
	if item.Quantity <= 0 {
		return fmt.Errorf("item quantity must be greater than zero")
	}

	existingItem, exists := i.items[strconv.Itoa(item.Id)]
	if exists {
		item.Quantity += existingItem.Quantity
	}

	i.items[strconv.Itoa(item.Id)] = item
	return nil
}

func (i *Inverntory) ListItems() []models.Item {
	var itemList []models.Item
	for _, i := range i.items {
		itemList = append(itemList, i)
	}
	return itemList
}

func NewInventory() *Inverntory {
	return &Inverntory{
		items: make(map[string]models.Item),
		logs:  models.Log{},
	}
}
