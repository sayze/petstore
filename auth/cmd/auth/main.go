package main

import (
	"bufio"
	"log"
	"net/http"
	"os"
	"time"

	ta "bitbucket.org/petstore/internal/access/token"
	"bitbucket.org/petstore/internal/handlers"
	"github.com/go-chi/chi"
	"github.com/go-chi/chi/middleware"
)

func main() {
	codes := "secrets.txt"

	// Attempt to puplate secrets through data file.
	if _, err := os.Stat(codes); err == nil {
		file, err := os.Open(codes)

		if err != nil {
			log.Fatal(err)
		}

		defer file.Close()

		scanner := bufio.NewScanner(file)

		for scanner.Scan() {
			ta.NewToken(scanner.Text())
		}

		if err := scanner.Err(); err != nil {
			log.Fatal(err)
		}

	} else {
		log.Printf("Warning: Could not locate file %s\n", codes)
	}

	// Router Config.
	router := chi.NewRouter()

	router.Use(middleware.Timeout(60 * time.Second))
	router.Use(middleware.Recoverer)
	router.Use(middleware.SetHeader("Content-Type", "application/json"))

	router.Post("/secret", handlers.Authenticate)
	router.Post("/token", handlers.ValidToken)
	log.Println("authentication service listening on port 3000 ")
	log.Fatal(http.ListenAndServe(":3000", router))
}
