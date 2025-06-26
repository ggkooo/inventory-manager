package services

import "fmt"

type SupplierService interface {
	GetInfo() string
}

type Supplier struct {
	CNPJ    string
	Contact string
	City    string
}

func (s *Supplier) GetInfo() string {
	return fmt.Sprintf("CNPJ: %s | Contact: %s | City: %s", s.CNPJ, s.Contact, s.City)
}
