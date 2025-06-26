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
		Reason:    "added item to inventory",
	})

	return nil
}

func (i *Inverntory) RemoveItem(itemId int, quantity int, user string) error {
	existingItem, exists := i.items[strconv.Itoa(itemId)]
	if !exists {
		return fmt.Errorf("item not found")
	}

	if quantity > existingItem.Quantity {
		return fmt.Errorf("item quantity invalid")
	}

	if quantity <= 0 {
		return fmt.Errorf("quantity must be greater than zero")
	}

	existingItem.Quantity -= quantity
	if existingItem.Quantity == 0 {
		delete(i.items, strconv.Itoa(itemId))
	} else {
		i.items[strconv.Itoa(itemId)] = existingItem
	}

	i.logs = append(i.logs, models.Log{
		Timestamp: time.Now(),
		Action:    "inventory exit",
		User:      user,
		ItemId:    itemId,
		Quantity:  quantity,
		Reason:    "removed item to inventory",
	})

	return nil
}

func FindByName(data []models.Item, name string) ([]models.Item, error) {
	var result []models.Item
	for _, item := range data {
		if item.Name == name {
			result = append(result, item)
		}
	}
	if len(result) == 0 {
		return nil, fmt.Errorf("nenhum item com o nome '%s' foi encontrado", name)
	}
	return result, nil
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
