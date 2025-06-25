package models

import "fmt"

type Item struct {
	Id       int
	Name     string
	Quantity int
	Price    float64
}

func (i Item) Info() string {
	return fmt.Sprintf("ID: %d | Name: %s | Quantity: %d | Price: %.2f", i.Id, i.Name, i.Quantity, i.Price)
}
