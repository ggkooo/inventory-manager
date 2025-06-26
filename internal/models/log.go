package models

import (
	"fmt"
	"time"
)

type Log struct {
	Timestamp time.Time
	Action    string
	User      string
	ItemId    int
	Quantity  int
	Reason    string
}

func (l Log) Info() string {
	return fmt.Sprintf("%s | %s | User: %s | Item ID: %d | Quantity: %d | Reason: %s", l.Timestamp.Format("2006-01-02 15:04:05"), l.Action, l.User, l.ItemId, l.Quantity, l.Reason)
}
