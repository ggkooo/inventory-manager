package services

import "inventory/internal/models"

type Inverntory struct {
	items map[string]models.Item
	logs  models.Log
}

func NewInventory() *Inverntory {
	return &Inverntory{
		items: make(map[string]models.Item),
		logs:  models.Log{},
	}
}
