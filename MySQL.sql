-- MySQL/ MariaDB
CREATE TABLE "item" (
  "item_id" SERIAL PRIMARY KEY,
  "item_name" varchar NOT NULL,
  "manufacturer" varchar NOT NULL,
  "price" decimal(10,2) NOT NULL,
  "quantity" int NOT NULL,
  "category" varchar NOT NULL
);

CREATE TABLE "category" (
  "category_id" varchar PRIMARY KEY,
  "category_name" varchar NOT NULL
);

ALTER TABLE "item" ADD FOREIGN KEY ("category") REFERENCES "category" ("category_id");
