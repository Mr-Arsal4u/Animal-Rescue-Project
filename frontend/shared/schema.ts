import { sql } from "drizzle-orm";
import { pgTable, text, varchar, integer, boolean, timestamp } from "drizzle-orm/pg-core";
import { createInsertSchema } from "drizzle-zod";
import { z } from "zod";

export const animals = pgTable("animals", {
  id: varchar("id").primaryKey().default(sql`gen_random_uuid()`),
  name: text("name").notNull(),
  breed: text("breed").notNull(),
  age: text("age").notNull(),
  size: text("size").notNull(),
  energy: text("energy").notNull(),
  description: text("description").notNull(),
  bio: text("bio").notNull(),
  imageUrl: text("image_url").notNull(),
  type: text("type").notNull(), // 'dog' or 'cat'
  available: boolean("available").notNull().default(true),
  createdAt: timestamp("created_at").defaultNow(),
});

export const adoptionApplications = pgTable("adoption_applications", {
  id: varchar("id").primaryKey().default(sql`gen_random_uuid()`),
  fullName: text("full_name").notNull(),
  email: text("email").notNull(),
  phone: text("phone").notNull(),
  animalType: text("animal_type").notNull(),
  experience: text("experience"),
  agreement: boolean("agreement").notNull(),
  status: text("status").notNull().default("pending"),
  createdAt: timestamp("created_at").defaultNow(),
});

export const stories = pgTable("stories", {
  id: varchar("id").primaryKey().default(sql`gen_random_uuid()`),
  title: text("title").notNull(),
  excerpt: text("excerpt").notNull(),
  adopter: text("adopter").notNull(),
  animalName: text("animal_name").notNull(),
  imageUrl: text("image_url").notNull(),
  adoptedDate: text("adopted_date").notNull(),
  createdAt: timestamp("created_at").defaultNow(),
});

export const insertAnimalSchema = createInsertSchema(animals).omit({
  id: true,
  createdAt: true,
});

export const insertApplicationSchema = createInsertSchema(adoptionApplications).omit({
  id: true,
  status: true,
  createdAt: true,
});

export const insertStorySchema = createInsertSchema(stories).omit({
  id: true,
  createdAt: true,
});

export type InsertAnimal = z.infer<typeof insertAnimalSchema>;
export type Animal = typeof animals.$inferSelect;

export type InsertApplication = z.infer<typeof insertApplicationSchema>;
export type Application = typeof adoptionApplications.$inferSelect;

export type InsertStory = z.infer<typeof insertStorySchema>;
export type Story = typeof stories.$inferSelect;
