-- MS SQL
CREATE TABLE [item] (
  [item_id] int PRIMARY KEY IDENTITY(1, 1),
  [item_name] nvarchar(255) NOT NULL,
  [manufacturer] nvarchar(255) NOT NULL,
  [price] decimal(10,2) NOT NULL,
  [quantity] int NOT NULL,
  [category] nvarchar(255) NOT NULL
)
GO

CREATE TABLE [category] (
  [category_id] nvarchar(255) PRIMARY KEY,
  [category_name] nvarchar(255) NOT NULL
)
GO

ALTER TABLE [item] ADD FOREIGN KEY ([category]) REFERENCES [category] ([category_id])
GO
