package models

/*
Token defines an individual user/access token.
*/
type Token struct {
	ID     int64
	Hash   string
	Active bool
}

/*
TokenRequest defines a token validation resource request .
*/
type TokenRequest struct {
	Token string `json:"token"`
}
