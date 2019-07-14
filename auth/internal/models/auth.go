package models

/*
AuthRequest defines a authentication resource request .
*/
type AuthRequest struct {
	Secret string `json:"secret"`
}
