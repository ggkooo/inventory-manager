package services

import "fmt"

type InfoService interface {
	GetInfo() string
}

type Disponibility interface {
	VerifyDisponibility(requestedQuantity int, avaliableQuantity int) bool
}

type SupplierService interface {
	InfoService
	Disponibility
}

type Supplier struct {
	CNPJ    string
	Contact string
	City    string
}

func (s *Supplier) GetInfo() string {
	return fmt.Sprintf("CNPJ: %s | Contact: %s | City: %s", s.CNPJ, s.Contact, s.City)
}

func (s *Supplier) VerifyDisponibility(requestedQuantity int, avaliableQuantity int) bool {
	return requestedQuantity <= avaliableQuantity
}
