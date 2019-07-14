package models

/*
Response defines how we expect a http response to look like.

In the traditional sense it's not what you would call a "Model" but given go's neat mechanism for handling json, placing it here seems fine for this service.
*/
type Response struct {
	Status  string `json:"status"`
	Message string `json:"message"`
	Value   string `json:"value"`
}
